<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ModelKategoriAlat;
use App\ModelAlat;

class GenerateAlat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alat:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $data = ModelKategoriAlat::all();
        $alt = [];
        foreach ($data as $item) {
            $alt[] = (object)[
                'id' => $item->id,
                'name' => $item->jenis_alat
            ];
        }

        $data_alat = ModelAlat::all();
        foreach ($data_alat as $item) {
            ModelAlat::find($item->id)->update(['kategori_alat_id' => $this->getId($item->nama_alat, $alt)]);
        }

    }

    private function getId($item, $arr){
        foreach ($arr as $data) {
            if($data->name == $item)
                return $data->id;
        }
    }
}
