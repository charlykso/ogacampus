<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\GiveawayRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;
use Illuminate\Http\Request;

class GiveawayController extends Controller
{
    private $giveawayRepository;
    private $schoolRepository;

    public function __construct(GiveawayRepositoryInterface $giveawayRepository, SchoolRepositoryInterface $schoolRepository){
        $this->giveawayRepository = $giveawayRepository;
        $this->schoolRepository = $schoolRepository;
    }

    public function index(){
        if(auth()->user()->role_id == 125){
           $giveaways = $this->giveawayRepository->getAll();
        } else {
           $giveaways = $this->giveawayRepository->getBySchool(auth()->user()->school_id);
        }
        $title = 'All Cash Giveaways';
        $schools = $this->schoolRepository->getAll();

        return view('admin.giveaways.index', compact('title', 'giveaways', 'schools'));
    }

    public function active(){
        $schoolId = auth()->user()->role_id == 125 ? null : auth()->user()->school_id;;
        $giveaways = $this->giveawayRepository->getActiveGiveaways($schoolId);
         $title = 'Active Cash Giveaways';

         return view('admin.giveaways.index', compact('title', 'giveaways'));
    }

    public function store(Request $request){
        $data = $request->all();
        $request->validate([
            'name' => 'required|unique:giveaways,name',
            'school_id' => 'required|integer',
            'amount' => 'required|integer',
            'max_count' => 'required|integer'
        ]);
        $giveaway = $this->giveawayRepository->createOrUpdate($data);

        toastr()->success('Giveaway created successfully!');
        return redirect()->back();
    }
}
