<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acueil extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

  public function hello(){
 		redirect(base_url('acueil/index'));
 	}

	public function index()
	{
		$this->load->view('formulaire');
	}

	public function kaiza(){
		redirect(base_url('acueil/bienvenue'));
	}

/*** Insertion dans entreprises et comptables**/
   public function save(){
    $this->load->model('news_model');
    $data1 = array(
        'nom' => $this->input->post('nom'),
        'adresse' => $this->input->post('adr'),
        'mdp' => $this->input->post('mdp'),
        'tel' => $this->input->post('tel'),
        'telecopie' => $this->input->post('telecopie')
    );
    $this->news_model->insertion('entreprises',$data1);
    $id = $this->news_model->lastid();
    $data2 = array(
        'id_entreprises' => $id,
        'date_deb_exo' => $this->input->post('deb'),
        'date_fin_exo' => $this->input->post('dfin'),
        'devise_tenue_compte' => $this->input->post('dvcompte'),
        'devise_equivalence' => $this->input->post('equiv')
    );
    $this->news_model->insertion('comptables',$data2);
    redirect(base_url('acueil/index'));
  }

  public function updateplancomptetiers(){
    $this->load->model('news_model');
    $table = "plan_compte_tiers";
    $id = $this->input->post('id');
    $data = array(
        'code' => $this->input->post('code'),
        'nom' => $this->input->post('nom')
    );
    if($id != 0){
      $this->news_model->modification($table,$id,$data);
    }else{
      $this->news_model->insertion($table,$data);
    }
    redirect(base_url('acueil/getplancomptetiers'));
  }

  public function updatecodejournal(){
    $this->load->model('news_model');
    $table = "code_journaux";
    $id = $this->input->post('id');
    $data = array(
        'code' => $this->input->post('code'),
        'type' => $this->input->post('type')
    );
    if($id != 0){
      $this->news_model->modification($table,$id,$data);
    }else{
      $this->news_model->insertion($table,$data);
    }
    redirect(base_url('acueil/getcodejournaux'));
  }

  public function updateplancompta(){
    $this->load->model('news_model');
    $table = "plan_comptable";
    $id = $this->input->post('id');
    $data = array(
        'numero' => $this->input->post('numero'),
        'compte' => $this->input->post('compte')
    );
    if($id != 0){
      $this->news_model->modificationplancomptable($table,$id,$data);
    }else{
      $this->news_model->insertion($table,$data);
    }
    redirect(base_url('acueil/getplancompta'));
  }

  public function deletecodejournaux(){
    $this->load->model('news_model');
    $table = "code_journaux";
    $id = $this->input->get('id');
    $this->news_model->supression($table,$id);
    redirect(base_url('acueil/getcodejournaux'));
  }

  public function deleteplancomptetiers(){
    $this->load->model('news_model');
    $table = "plan_compte_tiers";
    $id = $this->input->get('id');
    $this->news_model->supression($table,$id);
    redirect(base_url('acueil/getplancomptetiers'));
  }

  public function deleteplancompta(){
    $this->load->model('news_model');
    $table = "plan_comptable";
    $id = $this->input->get('id');
    $this->news_model->supressionplancomptable($table,$id);
    redirect(base_url('acueil/getplancompta'));
  }
/***Redirection vers la page de login**/
  public function login(){
		$this->load->view('login');
	}
/***Fonction de connexion**/
  public function connection(){
		$this->load->model('news_model');
		$table = "entreprises";
		$data = $this->news_model->selectionentreprises($table);
		for($i = 0; $i<count($data); $i++){
				if($this->input->post('nom') == $data[$i]['nom'] && $this->input->post('mdp') == $data[$i]['mdp']){
						$this->session->set_userdata('entreprise', $data[$i]);
            $id_e = $data[$i]['id'];
            $tableau = "comptables";
            $compta = $this->news_model->selectioncomptables($tableau,$id_e);
            $this->session->set_userdata('compta',$compta);
						break;
				}
		}
		redirect(base_url('acueil/processing'));
	}
/***fonction de traitement de connextion et renvoie vers login ou welcome**/
  public function processing(){
			if($this->session->has_userdata('entreprise')){
          redirect(base_url('acueil/welcome'));
			}
			else{
					redirect(base_url('acueil/login'));
			}
	}
/***redirection vers welcome.php**/
  public function welcome(){
		$this->load->view('welcome');
	}
/***fonction de selection du tableau code_journaux**/
  public function getcodejournaux(){
      $this->load->model('news_model');
      $table = "code_journaux";
      $data['codejournal'] = $this->news_model->selectioncodejournaux($table);
      $this->load->view('codejournal',$data);
  }
  // selectionnature
//   public function takeTypeCharge(){
//     $this->load->model('news_model');
//     $table = "type_charge";
//     $data['codejournal'] = $this->news_model->selectionnature($table);
//     $this->load->view('insert_AchatAnalytique',$data);
// }

// public function takeDiffCharge(){
//   $this->load->model('news_model');
//   $table = "different_charge";
//   $data['codejournal'] = $this->news_model->selectiondifferentcharge($table);
//   $this->load->view('insert_AchatAnalytique',$data);
// }

public function achat2(){
  $this->load->model('news_model');
  $table1 = "different_charge";
  $table2 = "type_charge";
  $data['DC'] = $this->news_model->selectiondifferentcharge($table1);
  $data['TC'] = $this->news_model->selectionnature($table2);
 
  $this->load->view('insert_AchatAnalytique',$data);
}


/***fonction de selection du tableau code_journaux**/
  public function getplancompta(){
      $this->load->model('news_model');
      $table = "plan_comptable";
      $data['plancomptable'] = $this->news_model->selectionplancompta($table);
      $this->load->view('plancompta',$data);
  }
/***fonction de selection du tableau code_journaux**/
  public function getplancomptetiers(){
      $this->load->model('news_model');
      $table = "plan_compte_tiers";
      $data = array();
      $data['plancomptetiers'] = $this->news_model->selectionplancomptetiers($table);
      for($i = 0; $i<count($data['plancomptetiers']); $i++){
          if($data['plancomptetiers'][$i]['code']=='F0'){
              $data['type'][$i] = "FRNS:".$data['plancomptetiers'][$i]['nom'];
          }
          else if($data['plancomptetiers'][$i]['code']=='C1'){
              $data['type'][$i] = "CLT:".$data['plancomptetiers'][$i]['nom'];
          }
      }
      $this->load->view('plancomptetiers',$data);
  }
/***fonction de selection du tableau journal**/
  public function getjournal(){
      $this->load->model('news_model');
      $table = "journal";
      $id = $_SESSION['entreprise']['id'];
      $data['journal'] = $this->news_model->selectionjournal($table,$id);
      $this->load->view('journal',$data);
  }
  /***fonction de selection du tableau journal**/
    public function getgrandlivre(){
        $this->load->model('news_model');
        $table = "journal";
        $id = $_SESSION['entreprise']['id'];
        $data['journal'] = $this->news_model->selectionjournalorder($table,$id);
        $data['total'] = $this->diffdc($data['journal']);
        $this->load->view('grandlivre',$data);
    }

    public function diffdc($compte){
        $this->load->model('news_model');
        $j = 0;
        $tableau = array();
        for($i = 0;$i < count($compte); $i++){
            if($i<count($compte)-1 && $compte[$i]['compte']!= $compte[$i+1]['compte'] || $compte[$i]['compte'] == $compte[count($compte)-1]['compte']){
                $debit = intval($this->news_model->sum_debit($compte[$i]['compte']));
                $credit = intval($this->news_model->sum_credit($compte[$i]['compte']));
                $tableau[$j] = $debit-$credit;
                $j++;
            }
        }
        return $tableau;
    }
    /***fonction de selection du tableau journal**/
      public function getbalance(){
          $this->load->model('news_model');
          $table = "journal";
          $id = $_SESSION['entreprise']['id'];
          $data['journal'] = $this->news_model->selectionjournal($table,$id);
          $data['debit'] = $this->getdebit();
          $data['credit'] = $this->getcredit();
          $reste = intval($this->getdebit())-intval($this->getcredit());
          if($reste > 0){
              $data['credit'] = $this->getcredit()+$reste;
          }else if ($reste < 0) {
              $data['debit'] = $this->getdebit()+abs($reste);
          }
          $data['reste'] = $reste;
          $this->load->view('balance',$data);
      }
/***fonctions de selections de vues **/
public function getdebit(){
    $this->load->model('news_model');
    $data = $this->news_model->v_debit();
    return $data;
}

public function getcredit(){
    $this->load->model('news_model');
    $data = $this->news_model->v_credit();
    return $data;
}
/***fonction ajout**/
  public function ajcodejournal(){
    $this->load->view('ajcodejournal');
  }

  public function ajplancompta(){
    $this->load->view('ajplancompta');
  }

  public function ajplancomptetiers(){
    $this->load->view('ajplancomptetiers');
  }
/***redirect to exercice or banquecaisse**/
  public function exo(){
    $get = $this->input->get('exo');
    $this->load->model('news_model');
    $table = "plan_comptable";
    if($get==0){
        $resultat = $this->news_model->selectionplancomptaimmobilisation($table);
        $this->session->set_userdata('choice', $resultat);
        $this->load->view('Exercice');
    }else if($get==1){
        $resultat = $this->news_model->selectionvente($table);
        $this->session->set_userdata('choice', $resultat);
        $this->load->view('Exercice');
    }else if($get==2){
        $resultat = $this->news_model->selectionbanque($table);
        $this->session->set_userdata('choice', $resultat);
        $this->load->view('banquecaisse');
    }else if($get==3){
        $resultat = $this->news_model->selectioncaisse($table);
        $this->session->set_userdata('choice', $resultat);
        $this->load->view('banquecaisse');
    }else if($get==4){
        $resultat = $this->news_model->selectioncapitaux($table);
        $this->session->set_userdata('choice', $resultat);
        $this->load->view('banquecaisse');
    }
  }
/***insertion journal**/
  public function savejournal(){
      $this->load->model('news_model');
      $id_entreprises = $_SESSION['entreprise']['id'];
      $compte = $this->input->post('compte');
      $activites = "";
      $compte_tiers = NULL;
      switch (substr($compte,0,1)) {
        case "2":
          $compte_tiers = 40310;
          $activites = "Achat";
          break;

        case "6":
          $compte_tiers = 40110;
          $activites = "Achat";
          break;

        case "7":
          $activites = "Ventes";
          if($compte == "70110"){
              $compte_tiers = 41110;
          }else if($compte == "70120"){
              $compte_tiers = 41120;
          }
          break;
      }
      $data = array(
          'id_entreprises' => $id_entreprises,
          'daty' => $this->input->post('daty'),
          'ref_piece' => $this->input->post('refpiece'),
          'compte' => $compte,
          'motifs' => $this->input->post('motifs'),
          'quantite' => $this->input->post('qte'),
          'compte_tiers' => $compte_tiers,
          'tiers' => $this->input->post('tiers'),
          'libelle' => $this->input->post('libelle'),
          'prix' => $this->input->post('prix'),
          'devise' => $this->input->post('devise'),
          'dc' => $this->input->post('dc')
      );
      $this->news_model->insertion('journal',$data);
      if($activites == "Achat"){
          $this->session->set_userdata('achat1', $data);  
          $this->achat($compte_tiers,$this->input->post('tiers'),$this->input->post('prix'),$id_entreprises,$this->input->post('daty'),$this->input->post('refpiece'),$this->input->post('motifs'),$this->input->post('libelle'),$this->input->post('devise'));
          // $datakely = $this->news_model->selectionCentre();
          // $this->load->view('');
          redirect(base_url('acueil/achat2'));
        }else if($activites == "Ventes"){
          $this->vente($compte_tiers,$this->input->post('tiers'),$this->input->post('prix'),$id_entreprises,$this->input->post('daty'),$this->input->post('refpiece'),$this->input->post('motifs'),$this->input->post('libelle'),$this->input->post('devise'));
        }
        redirect(base_url('acueil/deletesession'));
  }

  public function achat($ctiers,$tiers,$prix,$ide,$daty,$rpiece,$motifs,$libelle,$devise){
        $this->load->model('news_model');
      	$ttc = $prix*1.2;
        $tvadentr = $ttc-$prix;
        $data0 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => "44560",
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $tvadentr,
            'devise' => $devise,
            'dc' => "Debit"
        );
        $this->news_model->insertion('journal',$data0);
        $data1 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => $ctiers,
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $ttc,
            'devise' => $devise,
            'dc' => "Credit"
        );
        $this->news_model->insertion('journal',$data1);
        $data2 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => $ctiers,
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $ttc,
            'devise' => $devise,
            'dc' => "Debit"
        );
        $this->news_model->insertion('journal',$data2);
        $data3 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => "51200",
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $ttc,
            'devise' => $devise,
            'dc' => "Credit"
        );
        $this->news_model->insertion('journal',$data3);
  }

  public function vente($ctiers,$tiers,$prix,$ide,$daty,$rpiece,$motifs,$libelle,$devise){
        $this->load->model('news_model');
      	$ttc = $prix*1.2;
        $tvadentr = $ttc-$prix;
        $data0 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => "44570",
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $tvadentr,
            'devise' => $devise,
            'dc' => "Credit"
        );
        $this->news_model->insertion('journal',$data0);
        $data1 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => $ctiers,
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $ttc,
            'devise' => $devise,
            'dc' => "Debit"
        );
        $this->news_model->insertion('journal',$data1);
        $data2 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => $ctiers,
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $ttc,
            'devise' => $devise,
            'dc' => "Credit"
        );
        $this->news_model->insertion('journal',$data2);
        $data3 = array(
            'id_entreprises' => $ide,
            'daty' => $daty,
            'ref_piece' => $rpiece,
            'compte' => "51200",
            'motifs' => $motifs,
            'quantite' => 0,
            'compte_tiers' => NULL,
            'tiers' => NULL,
            'libelle' => $libelle,
            'prix' => $ttc,
            'devise' => $devise,
            'dc' => "Debit"
        );
        $this->news_model->insertion('journal',$data3);
  }

  public function etats_financiers_actifs(){
      $this->load->model('news_model');
      $comptelike = array("20","21","23");
      $comptelike1 = array("3","4","5");
      $data['date'] = "2023-03-31";
      $data['compte'] = $comptelike;
      $data['compte1'] = $comptelike1;
      $data['actifs'] = array();
      $data['nom_actifs'] = array();
      $data['ammort'] = 12345;
      $data['courants'] = array();
      $data['nom_courants'] = array();
      for ($i = 0;$i < count($comptelike);$i++){
          $data['actifs'][$i] = $this->news_model->etats_fi($comptelike[$i]);
          $data['nom_actifs'][$i] = $this->news_model->nom_fi($comptelike[$i]);
      }
      for ($i = 0;$i < count($comptelike1);$i++){
          $data['courants'][$i] = $this->news_model->etats_fi($comptelike1[$i]);
          $data['nom_courants'][$i] = $this->news_model->nom_fi($comptelike1[$i]);
      }
      $this->load->view('Etats_financiers',$data);
  }


  public function etats_financiers_passifs(){
      $this->load->model('news_model');
      $capital = array("10100","10610","11000","12800");
      $passifnc = array("161");
      $passifc = array("161","165","40","41","42","43","44");
      $data['date'] = "2023-03-31";
      $data['capital'] = $capital;
      $data['passifnc'] = $passifnc;
      $data['passifc'] = $passifc;
      $data['mcapital'] = array();
      $data['ncourants'] = array();
      $data['courants'] = array();
      $data['nom_capital'] = array();
      $data['nom_passifnc'] = array();
      $data['nom_passifc'] = array();
      for ($i = 0;$i < count($capital);$i++){
          $data['mcapital'][$i] = $this->news_model->etats_fi($capital[$i]);
          $data['nom_capital'][$i] = $this->news_model->nom_fi($capital[$i]);
      }
      for ($i = 0;$i < count($passifnc);$i++){
          $data['ncourants'][$i] = $this->news_model->etats_fi($passifnc[$i]);
          $data['nom_passifnc'][$i] = $this->news_model->nom_fi($passifnc[$i]);
      }
      for ($i = 0;$i < count($passifc);$i++){
          $data['courants'][$i] = $this->news_model->etats_fi($passifc[$i]);
          $data['nom_passifc'][$i] = $this->news_model->nom_fi($passifc[$i]);
      }
      $this->load->view('Etats_financiers1',$data);
  }


  public function deletesession(){
		$this->session->unset_userdata('choice');
		redirect(base_url('acueil/welcome'));
	}

	public function deconnect(){
		$this->session->unset_userdata('entreprise');
    $this->session->unset_userdata('compta');
		redirect(base_url('acueil/login'));
	}


  public function insertProduct(){
    $dataProduct = array(
      'idProduit' => NULL,
      'nomProduit' => $this->input->post('nom'),
    );
    $this->news_model->insertion("Produit", $dataProduct);
    redirect(base_url('acueil/welcome'));
  }


  public function insertCenter(){
    $dataProduct = array(
      'idCentre' => NULL,     
      'nomCentre' => $this->input->post('nomC'),
    );

   
    $this->news_model->insertion("Centre", $dataProduct);
    $id_entreprises = $_SESSION['entreprise']['id'];
    $lastid = $this->news_model->lastid();
    $dataProduct2 = array(
      'idEC' => NULL,     
      'id_entreprises' => $id_entreprises,     
      'idCentre' => $lastid,
    );
    $this->news_model->insertion("entreprise_centre", $dataProduct2);
		redirect(base_url('acueil/welcome'));
  }


  public function insertCenterPerEntreprise($id_e,$idCentre){
    $dataProduct = array(
      'idEC' => NULL,     
      'id_entreprises' => $id_e,     
      'idCentre' => $idCentre,
    );
    $this->news_model->insertion("entreprise_centre", $dataProduct);
		redirect(base_url('acueil/welcome'));
  }


 
  public function insertProductView(){
    $this->load->view('insert_produit');
  }
  public function insertCenterView(){
    $this->load->view('insert_centre');
  }
 

  public function getProductAnalytique(){
    $table="Produit";
    $data['produit'] = $this->news_model->selectionproduits($table);
    $this->load->view('product_toAnalytique',$data);
  }

  public function viewAnalytique(){
    $variable="variable";
    $fixe="fixe";
    $idProduit= $this->input->post('produit');
    $id_entreprises = $_SESSION['entreprise']['id'];
    $idAchats=$this->news_model->selectionidAchat($id_entreprises,$idProduit);
    for($i=0;$i<count($idAchats);$i++){
        $tableauParAchat = $this->news_model->selectionPerAchat($idAchats[$i],$id_entreprises,$idProduit);
        $liste[$i]['idCentre'] = array();
        $liste[$i]['nomCentre'] = array();
        $liste[$i]['pourcentage'] = array();
        $liste[$i]['valeur_centre'] = array();

        foreach ($tableauParAchat as $row) {
            $liste[$i]['idCentre'][] = $row['idCentre'];
            $liste[$i]['nomCentre'][] = $row['nomCentre'];
            $liste[$i]['pourcentage'][] = $row['pourcentage'];
            $liste[$i]['valeur_centre'][] = $row['valeur_centre'];
        }
    }
    $data['total_fixe'] = $this->news_model->getTotalTypeCharge($id_entreprises,$idProduit,$fixe);
    $data['total_variable'] = $this->news_model->getTotalTypeCharge($id_entreprises,$idProduit,$variable);
    $data['centre'] = $this->news_model->selectionCentre($id_entreprises);
    $data['total'] = $this->news_model->getTotal($id_entreprises, $idProduit);
    $data['analytique'] = $this->news_model->selection_analytique($id_entreprises, $idProduit);
    $data['analytique2'] = $this->news_model->selection_analytique2($id_entreprises, $idProduit);
    $data['liste'] = $liste;
    $data['achateffectue'] = $idAchats;


    $this->load->view('produit_analytique',$data);
  }



  public function viewIncorporable(){
    $this->load->model('news_model');
    if($this->input->post('charge')=="1" || $this->session->userdata('error')){
      $id_entreprises = $_SESSION['entreprise']['id'];
      $data1 = array(
        'charge' => $this->input->post('charge'),
        'type' => $this->input->post('type')
      );
      $table = "Produit";
      $data1['Produit'] = $this->news_model->selectionproduits($table);
      $data1['centre'] = $this->news_model->selectionCentre($id_entreprises);
      $this->load->view('insert_produitIncorporel',$data1);
    }
    else{
      redirect(base_url('acueil/welcome'));
    }
  }


  public function insertAnalytique(){
    $id_entreprises = $_SESSION['entreprise']['id'];
    $rubrique = $_SESSION['achat1']['motifs'];
    $prixUnitaire = $_SESSION['achat1']['prix'];
    $quantite = $_SESSION['achat1']['quantite'];
    $unite_d_oeuvre = $this->input->post('UE');
    $idtype = $this->input->post('type_charge');
    $idcharge = $this->input->post('charge');
    $idProduit = $this->input->post('idProduit');
    $pourcentage_produit = $this->input->post('pourcentage_produit');
    $centres = $this->news_model->selectionCentre($id_entreprises);
    $valeurPourcentageCentre = array();
    for($i=0;$i<count($centres);$i++){
      $nomCentre=$centres[$i]['nomCentre'];
      $valeur = $this->input->post($nomCentre);
      $valeurPourcentageCentre [] = $valeur;
    }
    $this->error($valeurPourcentageCentre);

    $achatAn = array(
      'idAchat' => NULL,
      'id_entreprises' => $id_entreprises,
      'rubrique' => $rubrique,
      'quantite' => $quantite,
      'prixUnitaire' => $prixUnitaire,
      'unite' => $unite_d_oeuvre,
      'idDC' => $idcharge,
      'idTypeCharge' => $idtype
    );

    // insert Achat analytique
      $this->news_model->insertion('AchatAnalytique',$achatAn);

    // insert produit_incorporable
      $lastIdAchat = $this->news_model->lastid();
      
      $PI= array(
        'idPI' => NULL,
        'idAchat' => $lastIdAchat,
        'idProduit' => $idProduit,
        'pourcentage_produit' => $pourcentage_produit
      ); 
      $this->news_model->insertion('produit_incorporable',$PI);

      
    // insert pourcentage_centre_par_produit
      $lastPI = $this->news_model->getLastIdPI();
      for($i=0;$i<count($centres);$i++){
        $PourcentageCentre = array(
          'idPourcentage' => NULL,
          'idPI' => $lastPI,
          'idCentre' => $centres[$i]['idCentre'],
          'pourcentage' => $valeurPourcentageCentre[$i]
        );
        $this->news_model->insertion('pourcentage_centre_par_produit',$PourcentageCentre);
      }
      redirect(base_url('acueil/welcome'));
  }

  public function error($tableau){
    $val = 0;
    for($i=0;$i<count($tableau);$i++){
      $val = $val + $tableau[$i];
    }
    if($val < 100 || $val > 100 ){
      $erreur="Vos pourcentages ne donne pas 100";
      $this->session->set_userdata('error',$erreur);
      redirect(base_url('acueil/viewIncorporable'));
    }
  }

}
