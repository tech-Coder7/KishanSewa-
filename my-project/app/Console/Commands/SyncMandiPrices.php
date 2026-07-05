<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MandiPrice;
use Illuminate\Support\Facades\Http;

class SyncMandiPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mandi:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Mandi Prices from data.gov.in Agmarknet API or simulate fallback fluctuations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env('DATA_GOV_API_KEY');

        if (!empty($apiKey)) {
            $this->info('Attempting to fetch live Mandi prices from data.gov.in...');

            try {
                // Fetch daily wholesale commodity prices resource
                $response = Http::timeout(10)->get('https://api.data.gov.in/resource/9ef842f8-9610-4250-8153-f7885056e014', [
                    'api-key' => $apiKey,
                    'format' => 'json',
                    'limit' => 50
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $records = $data['records'] ?? [];

                    if (count($records) > 0) {
                        $this->info('Successfully retrieved ' . count($records) . ' records. Syncing with database...');
                        
                        foreach ($records as $record) {
                            $commodity = trim($record['commodity'] ?? '');
                            $modalPrice = intval($record['modal_price'] ?? 0);
                            $market = trim($record['market'] ?? '');
                            $district = trim($record['district'] ?? '');
                            $state = trim($record['state'] ?? '');

                            if (empty($commodity) || $modalPrice <= 0) {
                                continue;
                            }

                            // Filter: ONLY show Jharkhand rates
                            if (strtolower($state) !== 'jharkhand') {
                                continue;
                            }

                            // Build pretty Mandi Name
                            $mandiName = implode(', ', array_filter([$market, $district, $state]));

                            // Map API commodity name to database standard naming
                            $cropName = $commodity;
                            $lowerComm = strtolower($commodity);

                            if ($lowerComm === 'wheat') {
                                $cropName = 'Wheat (Gehun)';
                            } elseif (in_array($lowerComm, ['paddy', 'rice'])) {
                                $cropName = 'Rice (Dhan)';
                            } elseif ($lowerComm === 'potato') {
                                $cropName = 'Potato (Aloo)';
                            } elseif ($lowerComm === 'tomato') {
                                $cropName = 'Tomato (Tamatar)';
                            } elseif ($lowerComm === 'onion') {
                                $cropName = 'Onion (Pyaj)';
                            } elseif (strpos($lowerComm, 'garlic') !== false) {
                                $cropName = 'Garlic (Lahsun)';
                            } elseif (strpos($lowerComm, 'mustard') !== false) {
                                $cropName = 'Mustard (Sarso)';
                            }

                            // Match existing record in database
                            $dbRecord = MandiPrice::where('crop_name', $cropName)->first();

                            if ($dbRecord) {
                                $oldPrice = $dbRecord->price;
                                $trend = 'stable';
                                if ($modalPrice > $oldPrice) {
                                    $trend = 'up';
                                } elseif ($modalPrice < $oldPrice) {
                                    $trend = 'down';
                                }

                                $diff = $modalPrice - $oldPrice;
                                $pct = $oldPrice > 0 ? round(($diff / $oldPrice) * 100) : 0;
                                $changePct = ($pct >= 0 ? '+' : '') . $pct . '%';

                                $dbRecord->update([
                                    'price' => $modalPrice,
                                    'trend' => $trend,
                                    'change_pct' => $changePct,
                                    'mandi_name' => $mandiName,
                                ]);
                            } else {
                                MandiPrice::create([
                                    'crop_name' => $cropName,
                                    'price' => $modalPrice,
                                    'unit' => 'Quintal',
                                    'trend' => 'stable',
                                    'change_pct' => '0%',
                                    'mandi_name' => $mandiName,
                                ]);
                            }
                        }

                        $this->info('Mandi prices synced successfully.');
                        return 0;
                    } else {
                        $this->warn('No records found in API response. Falling back to fluctuation simulation...');
                    }
                } else {
                    $this->error('Failed to contact data.gov.in API (Status: ' . $response->status() . '). Falling back to fluctuation simulation...');
                }
            } catch (\Exception $e) {
                $this->error('API Connection Error: ' . $e->getMessage() . '. Falling back to fluctuation simulation...');
            }
        }

        // Graceful Fallback Simulation
        $this->info('Running Mandi price simulation (simulating real-time market fluctuations)...');
        
        $dbRecords = MandiPrice::all();
        if ($dbRecords->isEmpty()) {
            $this->warn('No MandiPrice database records to simulate. Please run database seeder first.');
            return 1;
        }

        foreach ($dbRecords as $record) {
            $oldPrice = $record->price;
            
            // Random price change percentage: -5% to +5%
            $percentChange = rand(-5, 5);
            if ($percentChange === 0) {
                $percentChange = rand(0, 1) ? 2 : -2; // Ensure some fluctuation
            }

            $newPrice = intval(round($oldPrice * (1 + $percentChange / 100)));
            if ($newPrice < 500) {
                $newPrice = 500; // Floor limit
            }

            $trend = $percentChange > 0 ? 'up' : 'down';
            $changePct = ($percentChange > 0 ? '+' : '') . $percentChange . '%';

            $record->update([
                'price' => $newPrice,
                'trend' => $trend,
                'change_pct' => $changePct,
            ]);
        }

        $this->info('Simulated price fluctuation complete.');
        return 0;
    }
}
