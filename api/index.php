<?php 


    session_start();
    if($_GET["language"]) { 
        $_SESSION["langue"] = $_GET["language"];
    } 	
    $langue = $_SESSION["langue"];
    if (!isset($langue)) {
        $langue=1;
    }
    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    include "./../langues/".$langue.".php";
    $lettresA = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'a' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'a' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $A = [];
    for($j = 0;$j < count($lettresA); $j++) {
        $keyword = $lettresA[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($A, $lettresA[$j]);
    }                        
    $lettresB = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'b' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'b' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $B = [];
    for($j = 0;$j < count($lettresB); $j++) {
        $keyword = $lettresB[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($B, $lettresB[$j]);
    }                         
    $lettresC = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'c' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'c' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $C = [];
    for($j = 0;$j < count($lettresC); $j++) {
        $keyword = $lettresC[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($C, $lettresC[$j]);
    }
    $lettresD = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'd' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'd' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $D = [];
    for($j = 0;$j < count($lettresD); $j++) {
        $keyword = $lettresD[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($D, $lettresD[$j]);
    }                          
    $lettresE = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'e' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'e' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $E = [];
    for($j = 0;$j < count($lettresE); $j++) {
        $keyword = $lettresE[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($E, $lettresE[$j]);
    }                        
    $lettresF = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'f' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'f' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $F = [];
    for($j = 0;$j < count($lettresF); $j++) {
        $keyword = $lettresF[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($F, $lettresF[$j]);
    }                          
    $lettresG = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'g' AND langue = %i 
                        UNION 			
                        SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'g' AND langue = %i 
                        ORDER BY a ", $langue, $langue);
    $G = [];
    for($j = 0;$j < count($lettresG); $j++) {
        $keyword = $lettresG[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($G, $lettresG[$j]);
    }                         
    $lettresH = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'h' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'h' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $H = [];
    for($j = 0;$j < count($lettresH); $j++) {
        $keyword = $lettresH[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($H, $lettresH[$j]);
    }                    
    $lettresI = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'i' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'i' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $I = [];
    for($j = 0;$j < count($lettresI); $j++) {
        $keyword = $lettresI[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($I, $lettresI[$j]);
    }                    
    $lettresJ = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'j' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'j' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $J = [];
    for($j = 0;$j < count($lettresJ); $j++) {
        $keyword = $lettresJ[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($J, $lettresJ[$j]);
    }                    
    $lettresK = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'k' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'k' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $K = [];
    for($j = 0;$j < count($lettresK); $j++) {
        $keyword = $lettresK[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($K, $lettresK[$j]);
    }                    
    $lettresL = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'l' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'l' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $L = [];
    for($j = 0;$j < count($lettresL); $j++) {
        $keyword = $lettresL[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($L, $lettresL[$j]);
    }                    
    $lettresM = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'm' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'm' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $M = [];
    for($j = 0;$j < count($lettresM); $j++) {
        $keyword = $lettresM[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($M, $lettresM[$j]);
    }                    
    $lettresN = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'n' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'n' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $N = [];
    for($j = 0;$j < count($lettresN); $j++) {
        $keyword = $lettresN[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($N, $lettresN[$j]);
    }                    
    $lettresO = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'o' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'o' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $O = [];
    for($j = 0;$j < count($lettresO); $j++) {
        $keyword = $lettresO[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($O, $lettresO[$j]);
    }                    
    $lettresP = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'p' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'p' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $P = [];
    for($j = 0;$j < count($lettresP); $j++) {
        $keyword = $lettresP[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($P, $lettresP[$j]);
    }                    
    $lettresQ = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'q' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'q' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $Q = [];
    for($j = 0;$j < count($lettresQ); $j++) {
        $keyword = $lettresQ[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($Q, $lettresQ[$j]);
    }                    
    $lettresR = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'r' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'r' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $R = [];
    for($j = 0;$j < count($lettresR); $j++) {
        $keyword = $lettresR[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($R, $lettresR[$j]);
    }                    
    $lettresS = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 's' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 's' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $S = [];
    for($j = 0;$j < count($lettresS); $j++) {
        $keyword = $lettresS[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($S, $lettresS[$j]);
    }                    
    $lettresT = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 't' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 't' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $T = [];
    for($j = 0;$j < count($lettresT); $j++) {
        $keyword = $lettresT[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($T, $lettresT[$j]);
    }                    
    $lettresU = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'u' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'u' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $U = [];
    for($j = 0;$j < count($lettresU); $j++) {
        $keyword = $lettresU[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($U, $lettresU[$j]);
    }                    
    $lettresV = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'v' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'v' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $V = [];
    for($j = 0;$j < count($lettresV); $j++) {
        $keyword = $lettresV[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($V, $lettresV[$j]);
    }                    
    $lettresW = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'w' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'w' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $W = [];
    for($j = 0;$j < count($lettresW); $j++) {
        $keyword = $lettresW[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($W, $lettresW[$j]);
    }                    
    $lettresX = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'x' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'x' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $X = [];
    for($j = 0;$j < count($lettresX); $j++) {
        $keyword = $lettresX[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($X, $lettresX[$j]);
    }                    
    $lettresY = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'y' AND langue = %i 
                UNION 			
                SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'y' AND langue = %i 
                ORDER BY a ", $langue, $langue);
    $Y = [];
    for($j = 0;$j < count($lettresY); $j++) {
        $keyword = $lettresY[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($Y, $lettresY[$j]);
    }                
    $lettresZ = DB::query("SELECT DISTINCT terme as a FROM lexique WHERE LEFT(terme,1)= 'z' AND langue = %i 
					UNION 			
					SELECT DISTINCT synonyme as a FROM lexique WHERE LEFT(synonyme,1)= 'z' AND langue = %i 
					ORDER BY a ", $langue, $langue);
    $Z = [];
    for($j = 0;$j < count($lettresZ); $j++) {
        $keyword = $lettresZ[$j]["a"];
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $keyword, $keyword );
        $alire = [];
        $nbl = 0;
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
        }
        $nbl = count($alire);
        if($nbl != 0) array_push($Z, $lettresZ[$j]);
    }                    
    $data = array("A" => $A, "B" => $B, "C" => $C, "D" => $D, "E" => $E, "F" => $F, "G" => $G, "H" => $H, "I" => $I, "J" => $J, "K" => $K, "L" => $L, "M" => $M, "N" => $N, "O" => $O, "P" => $P, "Q" => $Q, "R" => $R,
                "S" => $S, "T" => $T, "U" => $U, "V" => $V, "W" => $W, "X" => $X, "Y" => $Y, "Z" => $Z);
                
    header('Content-Type: application/json');
    echo json_encode($data);
?>
