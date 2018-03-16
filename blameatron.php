<?PHP 

/** 
 * Blameatron PHP port.  
 * 
 * Random Hentai title generator 
 * 
 */ 
  

$countFile = 'count.html'; // File to store the hit counter in 
  
if ( !$_GET['raw'] && !$_GET['url']) 
    echo "<html><head><title>Fantastic new title generator!</title></head><body><div align='center'>Need a title for your hentai game?</div><br /><br /><br /><br /><br /><br /><div align='center' style='text-decoration:blink;font-size: 99px;'>"; 
  
  
if ( $_GET['url'] ) 
{ 

    header ( "Location: http://google.com/search?q=" . do_blame() . "&btnl=3564&btnI=I'm+Feeling+Lucky&safe=off");  // 

} 
  
if ( $_GET['tempt_fate'] != ''  || $_GET['raw']) 
{ 
    if($_GET['blamer']) 
    { 
    $randomNumber = rand ( 0, 3 ) ; 
        switch($randomNumber) 
            { 

            case 1: 
                counterblame($_GET['blamer']); 
                break; 
            default: 
                blame_whoever(); 
                break; 
            }     
         
    }else 
        blame_whoever(); 
     
     
    /* Do the page count - Apache's access logs were at 866 hits for blameatron.php when this was implemented. Exact generations unknown */ 

    file_put_contents ( $countFile, $count = trim  ( file_get_contents ( $countFile )+ 1 ) ); 
} 

function counterblame($target) 
{ 
    global $countFile; // I'M ALLOWED TO USE THEM, ALRIGHT?! YOU'RE NOT MY REAL DAD, YOU CAN'T MAKE ME BE RESTRAINED WHEN IT COMES TO VARIABLE SCOPE 
     
    // Magic random prize draw giver awayer. Every blamer has a one-in-100 chance of winning! 
    if ( rand (0,100) < 5 ) // lol magic numbers 
    { 
        $num = file_get_contents($countFile); 
        echo "Congratulations " . $target . "! You are the " . $num . num_suffix ( $num ) . " person to blame! Click here to redeem your prize!"; 
        return; 
    } 
     
    $lolOtherNumber = rand ( 0, 9 ) ; 
    switch($lolOtherNumber) 
        { 
        case 1: 
            echo $target . " will be bashed at LAN."; 
            break; 
        case 2: 
            echo "/me sets mode [+blame *" . $target . "*@*]"; 
            break; 
        case 3: 
            echo "/me sets mode [+b *" . $target . "*@*]"; 
            break; 
        case 4: 
            echo $target . " has been counterblamed!"; 
            break; 
        case 5: 
            echo "It's all " . $target . "'s fault."; 
            break; 
        case 6: 
            echo "!blame " . $target; 
            break; 
        default: 
            echo do_blame($target); 
            break; 
        } 


} 
function blame_whoever() 
{ 
     
    $names = array ("Someone"); 


    if ( !$_GET['name']) 
        echo do_blame($names[ rand ( 0, count ( $names ) -1 ) ]); 
    else 
        echo do_blame($_GET['name']); 
} 
function do_blame($target="") 
{ 
     
    $return = ""; 

    if(trim($target) == "BlameKips") 
    { 
        counterblame($_GET['blamer']); 
        return; 
    } 
    $actions = array (" is highly entertained by ", " is secretly interested in ", " blames ", " will go red if you mention ", " is only a little aroused by ", " was quietly asked to leave their job because of ", " earns a tidy living from ", " wishes his wife shared his love of ", " keeps a box of tissues just for ", " occasionally enjoys a bit of ", " can hardly walk after ", " will be limping for weeks as a result of ", " browses 4chan for ", " is on trial for ", " was kicked out of a nightclub because of ", " was once nearly arrested for ", " is grappling with writing a program for ", " no longer mentions ", " divided by zero when they saw ",
            " is afraid of (and a little excited by) ", " has a secret stash of ", " walked into a door because they were distracted by ", " went to Sweden to get ", " wants to legalise ", " is making a porno about ", " was quietly asked to leave their job involving ", " enjoys the taste of ", " loves delicious delicious ", " has been known to undertake in a spot of ", " sings to ", " had to go to hospital after engaging in ", " has a secret paypal fund to pay for ", " installed Tor so they could get away with ", " joined a political party advocating ", " earnestly apologises for their ", " is going to the Exford to find ", " left the Liberal party because they support ", " is cooking Jamaican Bacon using ", " spent his Krudd money on ",
            " wishes Channel 7 was allowed to show ", " owns a Rammstein album about ", " has some old ceiling stains from ", " needs to change their pants after seeing ", " travelled back in time to meet his grandfather for ", " is still cleaning up after last week's session of ", " blew the whistle on the PM's ", " wishes there was an iPhone app for ", " is never allowed to return to the zoo again because of ", " was kicked off the Respawn network for sharing ", " wrote their own manga about ", " was up all night on a Wednesday looking for ", " blames Squid for ", " is considered metrosexual because he likes ", " lost their girlfriend because of their love for ", " has a Roman statue engaging in" );
     
    $word[] = array ("Disgraceful", "Degrading", "Disgusting", "Despicable", "Depraved", "Disturbing", "Disturbed", "Derogatory", "Demeaning", "Disruptive", "Dangerous", "Desperate", "Distressing", 
                          "Deviant", "Deplorable", "Destitute", "Demonic", "Dastardly", "Delightful", "Delectable", "Deranged", "Demanding", "Despondent"); 
     
    $word[] = array ( "Anal", "Oral", "Rectal", "Rectal", "Vaginal", "Urethral", "Nasal", "Navel", "Penile", "Homosexual", "Coital", "Semenal", "Proctological", 
                          "Fecal", "Dental", "Beastial", "Haemorrhoidal", "Clitoral", "Triple", "Pentuple", "Sextuple"); 
     
    $word[] = array ("Masturbation", "Penetration", "Amputation", "Copulation", "Defecation", "Lactation", "Feminisation", "Immolation", "Mutilation", "Precipitation", "Obliteration", "Fellation", "Objectification", "Decapitation", "Conjugation",
                          "Constipation", "Flagellation", "Electrification", "Mastication", "Salivation", "Elongation", "Fertilization", "Flatulation", "Autofellation", "Gyration",  "Blaxploitation", "Ejaculation", "Telecommunications", "Fatsploitation",
                          "Strangulation", "Menstruation", "Perspiration", "Urination", "Fermentation", "Asphyxiation", "Deflagration", "Defibrillation", "Autoasphyxiation", "Lousy-Administration", "Castration", "Ovulation"); 
         
    $word[] = array ( "Exploitation", "Stimulation", "Desecration", "Consternation", "Education", "Orientation", "Fascination", "Defamation", "Infatuation", "Humiliation", "Synergisation", "Lubrication", "Participation",  "Flirtation", "Subjugation", "Objugation", "Evacuation",
                          "Abberation", "Domination", "Violation", "Desecration", "Perturbation", "Altercation",  "Televisation", "Temptation", "Desperation", "Instigation", "Consumation", "Abjugation", "Blameination", "Exploration", "Propagation",
                          "Preoccupation", "Segregation", "Medication", "Condemnation", "Frustration", "Derivation", "Incubation", "Babby-making", "Bastardisation", "Obligation", "Terrorisation", "Exclamation"); 

    // If a target is set, add an action to it 
    $target == "" ? true : $return .= $target . $actions[ rand ( 0, count ( $actions ) -1 ) ] . "~*~* " ; 
     
    // Pick a random word and uppercaserise each word 
    foreach ( $word as $words )  
    { 
        $return .= strtoupper(  $words[ rand ( 0, count ( $words ) -1 ) ] . ' ' ); 
    } 
    $target == "" ? true : $return .= "*~*~"; 
     
    return $return; 
} 

if ( !$_GET['raw']) 
{ 
?> 


<form method='get'><br /><br /> 
    <input type='submit' name='tempt_fate' value='Tempt fate.' /> 
</form></div> 
<br /><br /><h6 align='center'>lewis@9thcircle.net - <a href='https://github.com/wolfmother/BlameatronPHP'>GitHub Repo</a></h6></body></html> 

<!-- By Wolfmuffin and SirSquidness 02/05/2010 lol. SYNTACTICAL VALIDITY TESTS by sando // You have been count #<?PHP echo $count; ?> \\ --> 
<?PHP  
} 


function num_suffix ($number) 
{ 
     
    // Return "st", "nd", "rd" or "th" depending on the number 
    if ( $number > 10 ) 
        $number -= abs ( round ($number , -1 ) ); // take off all but the last digit 
         
    switch ( $number ) 
    { 
        case 1: return "st"; break; 
        case 2: return "nd"; break; 
        case 3: return "rd"; break; 
        default: return "th"; break; 
    } 
     
} 
 ?>