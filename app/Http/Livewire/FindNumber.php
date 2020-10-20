<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class FindNumber extends Component
{    
    /**
     * nbrChance
     *varible de progression du nombre de chance 
     * @var int
     */
    public $nbrChance = 0;    
    /**
     * choix
     *le nombre que doit saissir l'utilisateur
     * @var mixed
     */
    public $choix;
    public $end = false;    
    /**
     * nbr
     *le nombre à trouver
     * @var int
     */
    public $nbr =   5;    
    /**
     * test
     *variable du nombre de chance restant
     * @var int
     */
    public $test = 1;

    
    /**
     * 
     * test 
     *function main
     * @return void
     */
    public function test(){
       
        $this->vs($this->choix,$this->nbr);   
        $this->test = min(6,$this->test + 1);
        $this->hidde();      
    }
    
    /**
     * vs
     *comparaison entre le nombre saisie 
     *et le nombre de comparaison
     *  @param  int $data
     * @param  int $cible
     * @return void
     */
    public  function vs($data , $cible){
        if($data > $cible){
            $this->progressUp();
            session()
            ->flash('error', 'votre nombre est au dessus de notre nombre cible veillez ressayer svp !!!! ');
        }elseif($data < $cible){
            $this->progressUp();
            session()
            ->flash('error', 'votre nombre est en dessous de notre nombre cible veillez ressayer svp !!!! ');
        }else{
            $this->progressDown();
            $this->test = 0;
            session()->flash('success', 'vous avez trouver le nombre  '.$cible.' bravoooo !!!!');           

        }
    } 
    
    /**
     * progressUp
     *augmentation de la barre de progression 
     *  @return void
     */
    public function progressUp(){
        $this->nbrChance =min(100,$this->nbrChance + 20) ; 
    }
     
     /**
      * progressDown
      *mise de la barre de progression à 0
      * @return void
      */
     public function progressDown(){
        $this->nbrChance =0 ; 
    }
    
    /**
     * refresh
     *acctualisation de la page
     * @return void
     */
    public function refresh(){
        $this->test = 0;
        $this->nbrChance = 0;
        $this->end = false;
    }
    
    /**
     * hidde
     *afficher ou cacher le button recommencer
     * @return void
     */
    public function hidde(){
        if ($this->test == 6) {
            $this->end = true;
        }
    }

  

    public function render()
    {
        return view('livewire.find-number');
    }
}
