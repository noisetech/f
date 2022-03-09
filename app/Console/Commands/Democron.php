<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Democron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete data peminjaman panding';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ruangan_id = Peminjaman::where('status_peminjaman', 'Pending')
            ->where('created_at', Carbon::now()->subMinutes(65)->toDateTimeString())
            ->pluck('ruangan_id');

        $peminjaman_id =  Peminjaman::where('status_peminjaman', 'Pending')
        ->where('created_at', Carbon::now()->subMinutes(65)->toDateTimeString())
        ->pluck('id');


        Ruangan::whereIn('id', $ruangan_id)
            ->update([
                'status' => "Tersedia"
            ]);

        Peminjaman::whereIn('id', $peminjaman_id)->update([
            'status_peminjaman' => 'Gagal'
        ]);

        Peminjaman::where('status_peminjaman', 'Pending')
            ->where('created_at', Carbon::now()->subMinutes(65)->toDateTimeString())
            ->delete();
    }
}
