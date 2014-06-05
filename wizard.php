<?php 
    session_start(); 
    if (!isset($_GET['question']))
        $question = "first";
    else
        $question = $_GET['question'];
    
    require 'question.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Wikiportret - Stel uw foto's ter beschikking</title>
    </head>
    <body>
        <div id="all">
            <div id="header">
                <h1>Wikiportret</h1>
            </div>
            
            <div id="menu">
               <?php include 'menu.php'; ?>
            </div>
            
            <div id="content">
                <h2>Uploadwizard</h2>
                <?php
                    switch($question)
                    {
                        case "noupload":
                            result("noupload");
                            break;
                
                        case "upload":
                            result("upload");
                            break;
                        
                        case "success":
                            result("success");
                            break;

                        default:
                        case "first":
                            showquestion("Is het hoofdonderwerp van de foto mogelijk auteursrechtelijk beschermd? (Bijvoorbeeld: hoes van CD of DVD, logo, reclamebord)", "noupload", "ownwork", "Als u een foto maakt, heeft u zelf de auteursrechten van die foto. Als u echter een foto maakt van iets anders, waarop ook auteursrechten rusten, dan mag u uw foto toch niet vrij verspreiden. Dat kan bijvoorbeeld zo zijn bij foto's van een CD-hoes, DVD-hoes, logo, reclamebord of (film)poster. Het uploaden van uw foto betekent dan dat u de auteursrechten schendt op die CD-hoes enz.");
                            break;

                        case "ownwork":
                            showquestion("Heeft u de foto zelf gemaakt?", "employment", "noupload");
                            break;

                        case "employment":
                            showquestion("Heeft u de foto gemaakt in opdracht van een ander?", "employpermission", "ownpermission", "Als een ander u opdracht heeft gegeven om foto('s) te maken, dan heeft die ander (ook) auteursrechten op de foto. Dat kan bijvoorbeeld uw werkgever zijn, of de organisatie of persoon waar u (freelance) een opdracht doet. Als u een foto maakt in opdracht van uw werkgever, dan heeft uw werkgever (bijna) altijd auteursrechten op de foto. Als u de foto heeft gemaakt voor een andere opdrachtgever, dan ligt het eraan wat u afgesproken heeft over de auteursrechten. Als de auteursrechten (deels) bij uw werkgever/opdrachtgever liggen, mag u de foto niet zomaar uploaden, ook al heeft u de foto zelf gemaakt.");
                        break;

                        case "employpermission":
                            showquestion("Geeft de opdrachtgever toestemming voor onbeperkte verspreiding, bewerking en commercieel gebruik van de foto?", "upload", "noupload", "Als u de foto in opdracht van een ander hebt gemaakt, heeft u toestemming van die ander nodig om de foto te uploaden. Dit kunt u van tevoren hebben afgesproken (u heeft dan met de opdrachtgever afgesproken dat de auteursrechten volledig bij u liggen, en niet bij de opdrachtgever), maar u kunt ook achteraf toestemming vragen. 'Onbeperkt' betekent dat anderen zonder toestemming van de opdrachtgever uw foto mogen gebruiken, zonder dat zij aan u of de opdrachtgever hoeven te melden dat ze de foto gebruiken. Wel moet de ander u en/of de opdrachtgever als auteur noemen (tenzij u en de opdrachtgever aangegeven hebben dat dat niet nodig is). 'Onbeperkt' betekent dus ook dat de foto voor een commercieel doel gebruikt kan worden, bijvoorbeeld in een tijdschrift, website of reclamefolder.");
                            break;

                        case "ownpermission":
                            showquestion("Geeft u toestemming voor onbeperkte verspreiding, bewerking en commercieel gebruik van de foto?", "upload", "noupload", "'Onbeperkt' betekent dat anderen zonder uw toestemming uw foto mogen gebruiken, zonder dat zij aan u hoeven te melden dat ze de foto gebruiken. Wel moet de ander u als auteur noemen (tenzij u zelf aangegeven hebt dat dat niet nodig is). 'Onbeperkt' betekent dus ook dat uw foto voor een commercieel doel gebruikt kan worden, bijvoorbeeld in een tijdschrift, website of reclamefolder.");
                            break;

                        
                    }
                ?>
            </div>
        </div>
    </body>
</html>
