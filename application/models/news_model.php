<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
  /*public function get_info(){
    return array('auteur' => 'Rado Fanomezana',
                  'date' => '24/08/12',
                  'email' => 'email@ndd.fr');
  }

  public function getin_table($table){
    $query = "SELECT prenom,email,password,tel,img,est_admin FROM %s";
    $sql = sprintf($query,$table);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('prenom' => $row['prenom'],
                        'pwd' => $row['password'],
                        'email' => $row['email'],
                        'tel' => $row['tel'],
                        'img' => $row['img'],
                        'admin' => $row['est_admin']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  /*public function insertion($table,$ads,$nums,$ade,$numdrc,$ndir,$st,$dc,$de,$nidf,$dvse,$p){
      $query = "INSERT INTO %s (ads_siege,num_stat,ads_exploitation,num_reg_commerce,dirigeant,statut,creation,debut_exercice,identification_fiscale,devise,plan_comptable) values (%s,%s,%s,%d,%s,%s,%s,%s,%s,%d,%s)";
      $sql = sprintf($query,$table,$this->db->escape($ads),$this->db->escape($nums),$this->db->escape($ade),$numdrc,$this->db->escape($ndir),$this->db->escape($st),$this->db->escape($dc),$this->db->escape($de),$this->db->escape($nidf),$dvse,$this->db->escape($pc));
      $this->db->query($sql);
  }*/
/***Requete pour prendre dernier id inserer**/
  public function lastid(){
    $query = "SELECT last_insert_id()";
    $sql = sprintf($query);
    $result = $this->db->query($sql);
    $row = $result->row_array();
    return $row['last_insert_id()'];
  }

  public function selectionnature($table){
    $this->db->select('*');
    $this->db->from($table);
    $result = $this->db->get();
    
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array('idTypeCharge' => $row['idTypeCharge'],         
                     'typeCharge' => $row['typeCharge']
                    );
      // $table[$i] = $lists;
      $table[] = $lists;
      // $i++;
    }
    return $table;
  }


 
  

  public function selectiondifferentcharge($table){
    $this->db->select('*');
    $this->db->from($table);
    $result = $this->db->get();
    
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array('idDC' => $row['idDC'],         
                     'nomDC' => $row['nomDC']
                    );
      $table[$i] = $lists;
      $i++;
    }
    return $table;
  }

  public function selectionproduits($table){
    $this->db->select('*');
    $this->db->from($table);
    $result = $this->db->get();
    
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array('idProduit' => $row['idProduit'],         
                     'nomProduit' => $row['nomProduit']
                    );
      $table[$i] = $lists;
      $i++;
    }
    return $table;
  }

  
  public function selectionCentre($id_e){
    $table="v_centreEntreprise";
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('id_entreprises = ',$id_e);
    $result = $this->db->get();
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array(
                     'id_entreprises' => $row['id_entreprises'],
                     'idCentre' => $row['idCentre'],         
                     'nomCentre' => $row['nomCentre']
                    );
      $table[$i] = $lists;
      $i++;
    }
    return $table;
  }

   
  public function selection_analytique($id_e,$id_produit){
    $table="v_analytique";
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('id_entreprise = ',$id_e);
    $this->db->where('idProduit', $id_produit);
    $result = $this->db->get();
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array(
                     'id_entreprise' => $row['id_entreprise'],
                     'idAchat' => $row['idAchat'],   
                     'idProduit' => $row['idProduit'],         
                     'nomProduit' => $row['nomProduit'],         
                     'rubrique' => $row['rubrique'],         
                     'prixUnitaire' => $row['prixUnitaire'],         
                     'quantite' => $row['quantite'],         
                     'valeur_produit' => $row['valeur_produit'],         
                     'pourcentage' => $row['pourcentage'],         
                     'valeur_centre' => $row['valeur_centre'],         
                     'idCentre' => $row['idCentre'],          
                     'nomCentre' => $row['nomCentre'],         
                     'unite' => $row['unite'],         
                     'typeCharge' => $row['typeCharge']
                    );
      $table[$i] = $lists;
      $i++;
    }
    return $table;
  }

    
  public function selectionPerAchat($idAchat,$id_e,$id_produit){
    $table="v_analytique";
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('id_entreprise = ',$id_e);
    $this->db->where('idProduit', $id_produit);
    $this->db->where('idAchat', $idAchat);
    $result = $this->db->get();
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array(
                     'id_entreprise' => $row['id_entreprise'],
                     'idAchat' => $row['idAchat'],   
                     'idProduit' => $row['idProduit'],         
                     'nomProduit' => $row['nomProduit'],         
                     'rubrique' => $row['rubrique'],         
                     'prixUnitaire' => $row['prixUnitaire'],         
                     'quantite' => $row['quantite'],         
                     'valeur_produit' => $row['valeur_produit'],         
                     'pourcentage' => $row['pourcentage'],         
                     'valeur_centre' => $row['valeur_centre'],         
                     'idCentre' => $row['idCentre'],          
                     'nomCentre' => $row['nomCentre'],         
                     'unite' => $row['unite'],         
                     'typeCharge' => $row['typeCharge']
                    );
      $table[$i] = $lists;
      $i++;
    }
    return $table;
  }
  public function selectionidAchat($id_e,$idProduit)
    {
      $table = "v_analytique2";
        $this->db->select('idAchat');
        $this->db->from($table);
        $this->db->where('id_entreprise = ',$id_e);
        $this->db->where('idProduit = ',$idProduit);
        $query = $this->db->get();
        $result = $query->result();

        $tableau = array();
        foreach ($result as $row) {
            $tableau[] = $row->idAchat;
        }
        return $tableau;
    }

    public function getTotalTypeCharge($id_entreprise,$idProduit,$typeCharge){
        $query = $this->db->query("SELECT SUM(valeur_centre) AS total_fixe FROM v_analytique WHERE id_entreprise = '$id_entreprise' AND idProduit = '$idProduit' AND typeCharge = '$typeCharge'");
        $result = $query->row_array();
        $totalFixe = $result['total_fixe'];
        return $totalFixe;
    }

    public function getTotal($id_entreprise,$idProduit){
        $query = $this->db->query("SELECT sum(valeur_centre) as somme_global FROM v_analytique WHERE id_entreprise = '$id_entreprise' AND idProduit = '$idProduit' ");
        $result = $query->row_array();
        $totalFixe = $result['somme_global'];
        return $totalFixe;
    }

  public function selection_analytique2($id_e,$id_produit){
    $table="v_analytique2";
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('id_entreprise = ',$id_e);
    $this->db->where('idProduit', $id_produit);
    $result = $this->db->get();
    $table = array();
    $i = 0;
    foreach($result->result_array() as $row) {
      $lists = array(
                      'id_entreprise' => $row['id_entreprise'],
                      'idProduit' => $row['idProduit'],         
                     'nomProduit' => $row['nomProduit'],         
                     'idAchat' => $row['idAchat'],         
                     'prixUnitaire' => $row['prixUnitaire'],         
                     'quantite' => $row['quantite'],         
                     'rubrique' => $row['rubrique'],         
                     'valeur_produit' => $row['valeur_produit'],         
                     'unite' => $row['unite'],         
                     'typeCharge' => $row['typeCharge']         
                    );
      $table[$i] = $lists;
      $i++;
    }
    return $table;
  }


/***Requete pour prendre tous les elements du tableau entreprises**/
  public function selectionentreprises($table){
      $this->db->select('*');
      $this->db->from($table);
      $result = $this->db->get();

      $table = array();
      $i = 0;
      foreach ($result->result_array() as $row) {
          $lists = array('id' => $row['id'],
                          'nom' => $row['nom'],
                          'adresse' => $row['adresse'],
                          'mdp' => $row['mdp'],
                          'tel' => $row['tel'],
                          'telecopie' => $row['telecopie']);
          $table[$i] = $lists;
          $i++;
      }
      return $table;
  }
  /***Requete pour prendre tous les elements du tableau comptables**/
    public function selectioncomptables($table,$id_e){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_entreprises = ',$id_e);
        $result = $this->db->get();

        $lists = '';
        foreach ($result->result_array() as $row) {
            $lists = array('id' => $row['id'],
                            'd_db_exo' => $row['date_deb_exo'],
                            'd_fin_exo' => $row['date_fin_exo'],
                            'd_t_c' => $row['devise_tenue_compte'],
                            'd_e' => $row['devise_equivalence']);
        }
        return $lists;
    }
    /***Requete pour prendre tous les elements du tableau code journaux**/
      public function selectioncodejournaux($table){
          $this->db->select('*');
          $this->db->from($table);
          $result = $this->db->get();

          $table = array();
          $i = 0;
          foreach ($result->result_array() as $row) {
              $lists = array('id' => $row['id'],
                              'code' => $row['code'],
                              'type' => $row['type']);
              $table[$i] = $lists;
              $i++;
          }
          return $table;
      }
      /***Requete pour prendre tous les elements du tableau plan_compta**/
        public function selectionplancompta($table){
            $this->db->select('*');
            $this->db->from($table);
            $result = $this->db->get();

            $table = array();
            $i = 0;
            foreach ($result->result_array() as $row) {
                $lists = array( 'numero' => $row['numero'],
                                'compte' => $row['compte']);
                $table[$i] = $lists;
                $i++;
            }
            return $table;
        }
    /***Requete pour prendre tous les elements du tableau journal**/
      public function selectionjournal($table,$id_e){
          $this->db->select('*');
          $this->db->from($table);
          $this->db->where('id_entreprises = ',$id_e);
          $result = $this->db->get();

          $table = array();
          $i = 0;
          foreach ($result->result_array() as $row) {
              $lists = array('id' => $row['id'],
                              'id_entreprises' => $row['id_entreprises'],
                              'daty' => $row['daty'],
                              'ref_piece' => $row['ref_piece'],
                              'compte' => $row['compte'],
                              'motifs' => $row['motifs'],
                              'quantite' => $row['quantite'],
                              'compte_tiers' => $row['compte_tiers'],
                              'tiers' => $row['tiers'],
                              'libelle' => $row['libelle'],
                              'prix' => $row['prix'],
                              'devise' => $row['devise'],
                              'dc' => $row['dc']
                            );
              $table[$i] = $lists;
              $i++;
          }
          return $table;
      }

      /***Requete pour prendre tous les elements du tableau journal order by**/
        public function selectionjournalorder($table,$id_e){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where('id_entreprises = ',$id_e);
            $this->db->order_by('compte, daty', 'ASC');
            $result = $this->db->get();

            $table = array();
            $i = 0;
            foreach ($result->result_array() as $row) {
                $lists = array('id' => $row['id'],
                                'id_entreprises' => $row['id_entreprises'],
                                'daty' => $row['daty'],
                                'ref_piece' => $row['ref_piece'],
                                'compte' => $row['compte'],
                                'motifs' => $row['motifs'],
                                'quantite' => $row['quantite'],
                                'compte_tiers' => $row['compte_tiers'],
                                'tiers' => $row['tiers'],
                                'libelle' => $row['libelle'],
                                'prix' => $row['prix'],
                                'devise' => $row['devise'],
                                'dc' => $row['dc']
                              );
                $table[$i] = $lists;
                $i++;
            }
            return $table;
        }
        /***Requete pour prendre tous les elements du tableau plan_compta**/
          public function selectionplancomptaimmobilisation($table){
              $this->db->select('*');
              $this->db->from($table);
              $this->db->where("(numero LIKE '2%' OR numero LIKE '60%') AND numero NOT LIKE '603%'");
              $result = $this->db->get();

              $table = array();
              $i = 0;
              foreach ($result->result_array() as $row) {
                  $lists = array( 'numero' => $row['numero'],
                                  'compte' => $row['compte']);
                  $table[$i] = $lists;
                  $i++;
              }
              return $table;
          }
        /***Requete pour prendre tous les elements du tableau plan_compta**/
          public function selectionvente($table){
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where("numero LIKE '70%'");
                $result = $this->db->get();

                $table = array();
                $i = 0;
                foreach ($result->result_array() as $row) {
                    $lists = array( 'numero' => $row['numero'],
                                    'compte' => $row['compte']);
                    $table[$i] = $lists;
                    $i++;
                }
                return $table;
          }
          /***Requete pour prendre tous les elements du tableau plan_compta**/
            public function selectionbanque($table){
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where("(numero LIKE '51%' OR numero LIKE '58%') AND numero NOT LIKE '5814%'");
                $result = $this->db->get();

                $table = array();
                $i = 0;
                foreach ($result->result_array() as $row) {
                    $lists = array( 'numero' => $row['numero'],
                                    'compte' => $row['compte']);
                    $table[$i] = $lists;
                    $i++;
                }
                return $table;
            }
            /***Requete pour prendre tous les elements du tableau plan_compta**/
              public function selectioncapitaux($table){
                    $this->db->select('*');
                    $this->db->from($table);
                    $this->db->where("numero LIKE '1%'");
                    $result = $this->db->get();

                    $table = array();
                    $i = 0;
                    foreach ($result->result_array() as $row) {
                        $lists = array( 'numero' => $row['numero'],
                                        'compte' => $row['compte']);
                        $table[$i] = $lists;
                        $i++;
                    }
                    return $table;
              }
            /***Requete pour prendre tous les elements du tableau plan_compta**/
              public function selectioncaisse($table){
                  $this->db->select('*');
                  $this->db->from($table);
                  $this->db->where("numero LIKE '53%' OR numero LIKE '5814%'");
                  $result = $this->db->get();

                  $table = array();
                  $i = 0;
                  foreach ($result->result_array() as $row) {
                      $lists = array( 'numero' => $row['numero'],
                                      'compte' => $row['compte']);
                      $table[$i] = $lists;
                      $i++;
                  }
                  return $table;
              }
        /***Requete pour prendre tous les elements du tableau plan compte tiers**/
          public function selectionplancomptetiers($table){
              $this->db->select('*');
              $this->db->from($table);
              $result = $this->db->get();

              $table = array();
              $i = 0;
              foreach ($result->result_array() as $row) {
                  $lists = array( 'id' => $row['id'],
                                  'code' => $row['code'],
                                  'nom' => $row['nom']);
                  $table[$i] = $lists;
                  $i++;
              }
              return $table;
          }
/***Selection des somme d'une compte Debit**/
public function sum_debit($compte){
    $this->db->select('ifnull(sum(prix), 0) as somme');
    $this->db->from('journal');
    $this->db->where('compte', $compte);
    $this->db->where('dc', 'Debit');
    $result = $this->db->get();
    $row = $result->row_array();
    return $row['somme'];
}
/***Selection des somme d'une compte Credit**/
public function sum_credit($compte){
    $this->db->select('ifnull(sum(prix), 0) as somme');
    $this->db->from('journal');
    $this->db->where('compte', $compte);
    $this->db->where('dc', 'Credit');
    $result = $this->db->get();
    $row = $result->row_array();
    return $row['somme'];
}
/***Selection avec view **/
  public function v_debit(){
      $this->db->select('*');
      $this->db->from('v_debit');
      $result = $this->db->get();
      $row = $result->row_array();
      return $row['total'];
  }

  public function v_credit(){
      $this->db->select('*');
      $this->db->from('v_credit');
      $result = $this->db->get();
      $row = $result->row_array();
      return $row['total'];
  }
/***selection total par compte dans journal **/
public function v_compte($ref){
    $this->db->select_sum('prix','total');
    $this->db->from('journal');
    $this->db->where('compte',$ref);
    $result = $this->db->get();
    $row = $result->row_array();
    return $row['total'];
}
/***selection somme total prix d'un numero de compte specifier **/
public function etats_fi($actifs){
  $this->db->select('sum(prix) as somme');
  $this->db->from('journal');
  $this->db->where("compte LIKE '".$actifs."%'");
  $result = $this->db->get();
  $row = $result->row_array();
  return $row['somme'];
}

public function nom_fi($actifs){
  $this->db->select('motifs');
  $this->db->from('journal');
  $this->db->where("compte LIKE '".$actifs."%'");
  $result = $this->db->get();
  $row = $result->row_array();
  return $row['motifs'];
}
/***Requenet d'insertion dans n'importe table**/
  public function insertion($table,$data){
      $this->db->insert($table,$data);
  }

  public function modification($table,$id,$data){
      $this->db->where('id',$id);
      $this->db->update($table,$data);
  }

  public function supression($table,$id){
      $this->db->where('id',$id);
      $this->db->delete($table);
  }

  public function modificationplancomptable($table,$id,$data){
      $this->db->where('numero',$id);
      $this->db->update($table,$data);
  }

  public function supressionplancomptable($table,$id){
      $this->db->where('numero',$id);
      $this->db->delete($table);
  }
  public function getLastIdPI(){
    $query = $this->db->select_max('idPI')->get('produit_incorporable');
    $result = $query->row_array();
    $maxId = $result['idPI'];
    return $maxId;
  }

  /*public function get_users($table){
    $query = "SELECT prenom,email,password,tel,img,est_admin FROM %s where est_admin = %d";
    $etat = 0;
    $sql = sprintf($query,$table,$etat);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('prenom' => $row['prenom'],
                        'pwd' => $row['password'],
                        'email' => $row['email'],
                        'tel' => $row['tel'],
                        'img' => $row['img'],
                        'admin' => $row['est_admin']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function get_echange(){
    $query = "SELECT iduser1,iduser2,idobjet1,idobjet2,daty FROM %s";
    $table = "echange";
    $sql = sprintf($query,$table);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('user1' => $row['iduser1'],
                        'user2' => $row['iduser2'],
                        'objet1' => $row['idobjet1'],
                        'objet2' => $row['idobjet2'],
                        'daty' => $row['daty']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function historique(){
    $query = "SELECT * FROM %s";
    $table = "historique";
    $sql = sprintf($query,$table);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'id_user_av' => $row['id_user_avant'],
                        'id_objet' => $row['id_objet'],
                        'id_user_ap' => $row['id_user_apres'],
                        'daty' => $row['daty']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function get_categories(){
    $query = "SELECT * FROM %s";
    $table = "categories";
    $sql = sprintf($query,$table);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'valeur' => $row['valeur']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function get_object(){
    $query = "SELECT id,idproprietaire,prixestimatif,photo,description,date_ajout FROM %s where idCategories is NULL";
    $table = "objet";
    $sql = sprintf($query,$table);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'iduser' => $row['idproprietaire'],
                        'prix' => $row['prixestimatif'],
                        'img' => $row['photo'],
                        'description' => $row['description'],
                        'date' => $row['date_ajout']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function get_userobject($iduser){
    $query = "SELECT id,idproprietaire,prixestimatif,photo,description,date_ajout FROM %s where idProprietaire = %d";
    $table = "objet";
    $sql = sprintf($query,$table,$iduser);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'iduser' => $row['idproprietaire'],
                        'prix' => $row['prixestimatif'],
                        'img' => $row['photo'],
                        'description' => $row['description'],
                        'date' => $row['date_ajout']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function get_otherobject($iduser){
    $query = "SELECT id,idproprietaire,prixestimatif,photo,description,date_ajout FROM %s where idProprietaire != %d";
    $table = "objet";
    $sql = sprintf($query,$table,$iduser);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'iduser' => $row['idproprietaire'],
                        'prix' => $row['prixestimatif'],
                        'img' => $row['photo'],
                        'description' => $row['description'],
                        'date' => $row['date_ajout']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  /*public function select_username($condition){

  }

  public function select_objectname($condition){

  }*/

  /*public function inscription($table,$nom,$prenom,$email,$password,$tel,$img,$est_admin,$date_inscription){
      $query = "INSERT INTO %s (nom,prenom,email,password,tel,img,est_admin,date_inscription) values (%s,%s,%s,%s,%s,%s,%d,%s)";
      $sql = sprintf($query,$table,$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($email),$this->db->escape($password),$this->db->escape($tel),$this->db->escape($img),$this->db->escape($est_admin),$this->db->escape($date_inscription));
      $this->db->query($sql);
  }

  public function addcategorie($valeur){
      $query = "INSERT INTO categories (valeur) values (%s)";
      $sql = sprintf($query,$this->db->escape($valeur));
      echo $sql;
      $this->db->query($sql);
  }

  public function select_user($condition){
      $query = "SELECT prenom FROM users where id = %d";
      $sql = sprintf($query,$condition);
      $result = $this->db->query($sql);
      $row = $result->row_array();
      return $row['prenom'];
  }

  public function select_objectname($condition){
      $query = "SELECT description FROM objet where id = %d";
      $sql = sprintf($query,$condition);
      $result = $this->db->query($sql);
      $row = $result->row_array();
      return $row['description'];
  }

  public function select_object($condition){
      $query = "SELECT idproprietaire FROM objet where id = %d";
      $sql = sprintf($query,$condition);
      $result = $this->db->query($sql);
      $row = $result->row_array();
      return $row['idproprietaire'];
  }

  public function search_all($cle){
    $query = "SELECT * FROM objet where description like '%".$cle."%'";
    $result = $this->db->query($query);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'idCategories' => $row['idCategories'],
                        'iduser' => $row['idProprietaire'],
                        'prix' => $row['prixestimatif'],
                        'img' => $row['photo'],
                        'description' => $row['description'],
                        'date' => $row['date_ajout']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  public function search_categorie($cle,$categorie){
    $query = "SELECT * FROM objet where description like '%".$cle."%' and idcategories = ".$categorie;
    $result = $this->db->query($query);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('id' => $row['id'],
                        'idCategories' => $row['idCategories'],
                        'iduser' => $row['idProprietaire'],
                        'prix' => $row['prixestimatif'],
                        'img' => $row['photo'],
                        'description' => $row['description'],
                        'date' => $row['date_ajout']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }*/
}
