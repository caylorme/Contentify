<?php namespace App\Modules\Teams\Controllers;

use App\Modules\Teams\Models\Team as Team;
use Hover, BackController;

class AdminTeamsController extends BackController {

    protected $icon = 'group.png';

    public function __construct()
    {
        $this->modelName = 'Team';

        parent::__construct();
    }

    public function index()
    {
        $this->indexPage([
            'tableHead' => [
                trans('app.id')     => 'id', 
                trans('app.title')  => 'title'
            ],
            'tableRow' => function($team)
            {
                $hover = new Hover();
                if ($team->icon) $hover->image($team->uploadPath().$team->icon);

                return [
                    $team->id,
                    $hover.$team->title,
                ];            
            }
        ]);
    }

}