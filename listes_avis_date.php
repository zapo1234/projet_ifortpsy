<?php
include("classes/db.classes.php");
include("classes/avis.classes.php");
include("classes/add.classes.php");

 if($_POST['action']=="recher_date"){
 // instancier la classe add
 $add = new Add();
// recupere les avis par la date selectionne
 $dates =$_POST['dates'];
// afficher 
 $list = $add->recherDate($dates);
 if($list){
// afficher un tableau de valeur 
 $outpout= '<table class="tabs" border="1" style=width:"700px";height:"400px";text-align:center">
					<th>Nom</th>
					<th>email</th>
					<th>Avis clients</th>
					<th>Note<th>';
					foreach($list as $values) {
					// recupere la date et la transformer en français
					$outpout .='<tr><td>'.$values['nom'].'</td>
					            <td>'.$values['email'].'</td>
								<td>'.$values['message'].'</td>
								<td>'.$values['note'].'<td>
								</tr>';
					}
					$outpout .='</table>';
					echo$outpout;
					}
					else{
					echo'pas de liste correspondant à cette date';
					}
		}
 if($_POST['action']=="recher_note"){
// instancier la classe add
 $add = new Add();
// recupere les avis par la date selectionne
 $note =$_POST['note'];
 $list = $add->recherNotes($note);
 
 if($list){
// afficher un tableau de valeur 
 $outpout= '<table class="table" border="1" style=width:"700px";height:"400px";text-align:center">
					<th>Nom</th>
					<th>email</th>
					<th>Avis clients</th>
					<th>Note<th>';
					foreach($list as $values) {
					// recupere la date et la transformer en français
					$outpout .='<tr><td>'.$values['nom'].'</td>
					            <td>'.$values['email'].'</td>
								<td>'.$values['message'].'</td>
								<td>'.$values['note'].'<td>
								</tr>';
					}
					$outpout .='</table>';
					echo$outpout;
					}
					else{
					echo'pas de liste correspondant à cette note';
					}
 
 
 }

?>