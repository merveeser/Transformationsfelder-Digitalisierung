<?php
session_start();
$seitenInhalt = "Pflanzenkatalog";
include("connection.php");
include("header.php");

if(isset($_POST['search']) != "" && ($_POST['search'] !="")){
	 $searchq = $_POST['search'];
	 $query = ("SELECT * FROM steckbrief INNER JOIN pflanze ON steckbrief.Pflanze_idPflanze=pflanze.idPflanze WHERE Name LIKE '%$searchq%'");	
}elseif(isset($_POST['herbst']) != ""){
	 $searchq = "herbst";
	 $query = ("SELECT * FROM steckbrief INNER JOIN pflanze ON steckbrief.Pflanze_idPflanze=pflanze.idPflanze WHERE Jahreszeit LIKE '%$searchq%'");
}elseif(isset($_POST['sommer']) != ""){
	 $searchq = "sommer";
		 $query = ("SELECT * FROM steckbrief INNER JOIN pflanze ON steckbrief.Pflanze_idPflanze=pflanze.idPflanze WHERE Jahreszeit LIKE '%$searchq%'");
}elseif(isset($_POST['fruehling']) != ""){
	 $searchq = "fruehling";
		 $query = ("SELECT * FROM steckbrief INNER JOIN pflanze ON steckbrief.Pflanze_idPflanze=pflanze.idPflanze WHERE Jahreszeit LIKE '%$searchq%'");
}elseif(isset($_POST['winter']) != ""){
	 $searchq = "winter";
		 $query = ("SELECT * FROM steckbrief INNER JOIN pflanze ON steckbrief.Pflanze_idPflanze=pflanze.idPflanze WHERE Jahreszeit LIKE '%$searchq%'");
}else{
	$query =  "SELECT * FROM steckbrief INNER JOIN pflanze ON steckbrief.Pflanze_idPflanze=pflanze.idPflanze ";
}

if($resultat = mysqli_query($link,$query)){
	
?>
<script type="text/javascript" src="favorisiert.js"></script> 

    <!-- Inhalt -->  
    <p>In diesem Katalog sind Pflanzenarten zusammengestellt, die als Futterpflanzen für Honigbienen und Wildbienen geeignet sind.
    Diese Pflanzen werden auch Trachtpflanzen genannt.
    Die Pflanzenlisten geben Hinweise darauf, welche Pflanzenarten für bestimmte Zielgruppen genutzt werden können. Die zum Teil sehr
    umfangreichen Listen lassen Spielraum für eigene Zusammenstellungen von Pflanzenarten nach z.B. Blütezeit oder Standortbedingungen.
    Die Listen umfassen u. a. Pflanzenarten, die sowohl gärtnerischen Zwecken als auch der Ernährung der Bienen dienen. Nicht aufgeführt
    sind Sorten, von denen häufig eine Vielzahl im Handel erhältlich ist.
    Die Pflanzenarten können nach verschiedenen Kriterien gesucht werden: z.B. deutscher Name, wissenschaftlicher Name, Lebensformen,
    Blütezeit, Blütenfarbe, Biotoptyp oder Zielgruppen. Auch können Listen mit wissenschaftlichen Namen alphabetisch angezeigt werden.</p> <p>weitere Infos unter:</p> <a href="http://144.41.33.58/4DACTION/W_Init/BWPKBW_3_1_de.shtml"></a>
    <div class="container">
        <form class="mt-5 mb-1" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Pflanze suchen...">
                </div>
            </div>
         
       
        <div class="btn-group mb-3">
           
            <button type="submit" name="filter" id="filter" class="btn btn-sm btn-outline-secondary">Filter zurücksetzen</button>
            <button type="submit" name="fruehling" id="fruehling" class="btn btn-sm btn-outline-secondary">Frühling</button>
            <button type="submit" name="sommer" id="sommer" class="btn btn-sm btn-outline-secondary">Sommer</button>
            <button type="submit" name="herbst" id="herbst" class="btn btn-sm btn-outline-secondary">Herbst</button>
<button type="submit" name="winter" id="winter" class="btn btn-sm btn-outline-secondary">Winter</button>
        </div>
</form>
<?php
		while($row = mysqli_fetch_array($resultat)){
			
		?>
		
                <div class="">
            <div class="row">
                <div class="col-md">
                    <div class="card card-body mb-2">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0"><img src="img/<?php print_r($row[18]);?>.jpg" width="180" height="150" alt=""> </div>
                            <h6 class="media-title font-weight-semibold mt-5" style="width: 170px;"> <a href="pflanze.php? id=<?php print_r($row[14]);?>" data-abc="true"><?php print_r($row[15]);?>
                            <a href="insertMerkliste.php? id=<?php print_r($row[14]);?>" data-abc="true" id="weiterleiten"><i class="material-icons" id="markieren" style="vertical-align: middle;">bookmark_border</i>
                            </a>
                            </h6>
                            <div class="media-body">

                            <div class="mt-4 text-center">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mt-3">
                                                <img src="img/gießkanne.png" style="height: 30px; width: 30px;"/>
                                                <p class="mb-0 text-muted"><?php print_r($row[8]);?></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mt-3">
                                                <img src="img/sonne.png" style="height: 30px; width: 30px;"/>
                                                <p class="mb-0 text-muted"><?php print_r($row[9]);?></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mt-3">
                                                <img src="img/bese.png" style="height: 30px; width: 30px;"/>
                                                <p class="mb-0 text-muted"><?php print_r($row[12]);?></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mt-3">
                                                <img src="img/kalender.png" style="height: 30px; width: 30px;"/>
                                                <p class="mb-0 text-muted"><?php print_r($row[2]);?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mt-lg-4 ml-lg-3 text-center">
                                <div class="text-muted">31 Bewertungen</div>
                                    
        <div>
            <div class="rating" data-rate-value=6></div>
        </div>
    
    <script>
        var options = {
                max_value: 5,
                step_size: 1,
            }
        $(".rating").rate(options);
        $(".rating").rate("setValue", 4);
    </script>
                                <div class="text-warning">Pflanze bewerten</div>
                            </div>
                        </div>
                    </div>	
<?php
		}
}
 include ("footer.php"); 
?>