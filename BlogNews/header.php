<!DOCTYPE HTML>
<html>

<head>
    <title>Blog</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <?php wp_head();?>
</head>
<body>

<div id="MAIN_backgroundContainer">
    <div id="MAIN_featureImage" class="MAIN_featureImageNews"> </div>
    <div id="MAIN_siteContainer">
        <div id="MAIN_navContainer">
            <div id="MAIN_logo">
                <a href="https://www.msauk.org/"><img src="<?php bloginfo('template_url');  ?>/images/msa-logo.png" alt="MSA"/></a>
            </div>
            <div id="MAIN_logomobile">
                <a href="https://www.msauk.org/"><img src="<?php bloginfo('template_url');  ?>/images/msa-logo-mobile.png" alt="MSA"/></a>
            </div>
            <div id="MAIN_searchContainer">
                <form action="https://www.msauk.org/Search-Results" method="get">
                    <div class="searchcontainer">
                        <input type="text" name="strSearchTerm" id="strSearchTerm" value="" />
                    </div>
                    <input type="image" id="btnSearch" name="btnSearch" src="<?php bloginfo('template_url');  ?>/images/searchIcon.png" alt="Search"/>
                </form>
            </div>
            <div class="clear"></div>
            <div id="MAIN_navItems">
                <span class="menu-toggle-container"><a id="menu-toggle" class="anchor-link" href="#">Menu</a></span>
                <div class="clear"></div>
                <nav>
                    <ul id="menu" class="navigation">
                        <li rel="Home" data-summary="" class="subnav first hasChildren">
                            <a href="https://www.msauk.org/" >Home</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="About us" data-summary="About the Motor Sports Association" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Home/About-us">About us</a>
                                        </li>
                                        <li rel="Contact us" data-summary="Contact the Motor Sports Association" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Home/Contact-us">Contact us</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle1">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText1"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="News publications" data-summary="" class="subnav selected hasChildren">
                            <a href="https://www.msauk.org/News">News &amp; publications</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Blog" data-summary="Read and Comment the MSA Blog" class="subnav selected first hasChildren">
                                            <a href="https://www.msauk.org/News-Publications/Publications">Blog</a>
                                        </li>
                                        <li rel="Publications" data-summary="Read the MSA Yearbooks, magazines, newsletters and annual reports" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/News-Publications/Publications">Publications</a>
                                        </li>
                                        <li rel="Videos" data-summary="Watch the latest videos to see MSA initiatives in action" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/News-Publications/Videos">Videos</a>
                                        </li>
                                        <li rel="Regulations" data-summary="Find out how motor sport is regulated and have your say on future rule changes" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Regulations">Regulations</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle17">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText17"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="The Sport" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/The-Sport">The Sport</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Types of Motor Sport" data-summary="Find out about the various disciplines of motor sport, from racing, rallying and karting to sprints, hill climbs, trials and more" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Types-of-Motor-Sport">Types of Motor Sport</a>
                                        </li>
                                        <li rel="Governance" data-summary="How the MSA regulates and administers UK motor sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Governance">Governance</a>
                                        </li>
                                        <li rel="Regulations" data-summary="Find out how motor sport is regulated and have your say on future rule changes" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Regulations">Regulations</a>
                                        </li>
                                        <li rel="National Court" data-summary="Learn about the judicial system for UK motor sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/National-Court">National Court</a></li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="FIA" data-summary="The governing body of world motor sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/FIA" target="_self">FIA</a>
                                        </li>
                                        <li rel="Social Responsibility" data-summary="How motor sport can contribute to society in areas such as education, the environment, technology and road safety" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Social-Responsibility">Social Responsibility</a>
                                        </li>
                                        <li rel="Risk Management"
                                            data-summary="How motor sport has achieved an excellent safety record" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Risk-Management">Risk Management</a>
                                        </li>
                                        <li rel="Awards" data-summary="From championship titles to special awards for outstanding service and achievement" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Awards">Awards</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Dare to be Different" data-summary="Driving Female Talent" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Dare-to-be-Different">Dare to be Different</a>
                                        </li>
                                        <li rel="RallyFuture" data-summary="Ensuring a bright future for UK stage rallying by taking steps to further enhance safety" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Rally-Future">RallyFuture</a>
                                        </li>
                                        <li rel="Race n Respect" data-summary="" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Race-n-Respect" target="_self">Race 'n' Respect</a>
                                        </li>
                                        <li rel="Other organisations"
                                            data-summary="Useful information on motor sport groups outside the MSA" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Other-motor-sport-organisations">Other organisations</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle23">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText23"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Clubs Organisers" data-summary="" class="subnav hasChildren"><a
                                href="https://www.msauk.org/Clubs-Organisers">Clubs &amp; Organisers</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="FAQ" data-summary="Are you a club or organiser with have a query? You may find the answer in our frequently asked questions" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Clubs/FAQ">FAQ</a>
                                        </li>
                                        <li rel="Find Clubs" data-summary="There are 750 MSA-registered motor clubs, so find and join those nearest to you" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Clubs/Find-Clubs">Find Clubs</a>
                                        </li>
                                        <li rel="Regional Associations" data-summary="There are 13 Regional Associations representing hundreds of motor clubs nationwide" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Clubs/Regional-Associations">Regional Associations</a>
                                        </li>
                                        <li rel="Club Development" data-summary="How the MSA can help your club to promote its activities and recruit new members" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Clubs/Club-Development">Club Development</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Route Authorisation" data-summary="Everything you need to know about planning an event on the public highway" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Clubs/Route-Authorisation">Route Authorisation</a>
                                        </li>
                                        <li rel="Taster Events" data-summary="Recruit new members to your club by running a special Taster Event" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Clubs/Taster-events">Taster Events</a>
                                        </li>
                                        <li rel="Club recognition" data-summary="Official announcements of prospective new clubs and name changes" class="subnav hasChildren">
                                            <a
                                                href="https://www.msauk.org/Clubs/Motor-Clubs-applying-for-Recognition-Changes-to-Recognised-Clubs">Club recognition</a>
                                        </li>
                                        <li rel="Login" data-summary="" class="subnav hasChildren">
                                            <a href="http://members.msauk.org" target="_blank">Login</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Public Liability Certificate" data-summary="" class="subnav hasChildren">
                                            <a href="http://www.jltgroup.com/sports-insurance/msa/forms-downloads/" target="_blank">Public Liability Certificate</a>
                                        </li>
                                        <li rel="Resource centre" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Clubs-Organisers">Resource centre</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle16">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText16"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Events" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Events">Events</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Find Events" data-summary="There are 5,000 motor sport events across the UK every year. Search for them here" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Events/Find-Events">Find Events</a>
                                        </li>
                                        <li rel="NCAFP Calendar" data-summary="List of UK events open to foreign competitors" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/National-Competitions-Authorised-for-Foreign-Participation">NCAFP Calendar</a>
                                        </li>
                                        <li rel="MSA Championships" data-summary="The premier titles in UK motor sport: The MSA British and Home Countries Championships" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/MSA-Championships">MSA Championships</a>
                                        </li>
                                        <li rel="F1 British Grand Prix" data-summary="The oldest round of the FIA Formula One World Championship" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/World-Events/F1-British-Grand-Prix">F1 British Grand Prix</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Wales Rally GB" data-summary="The final round of the FIA World Rally Championship (WRC)" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/World-Events/Wales-Rally-GB">Wales Rally GB</a>
                                        </li>
                                        <li rel="WEC Silverstone"
                                            data-summary="World Endurance Championship 6 Hours of Silverstone" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/World-Events/World-Endurance-Championship">WEC Silverstone</a>
                                        </li>
                                        <li rel="WRX Lydden Hill" data-summary="FIA World Rallycross Championship at Kents Lydden Hill" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/World-Events/World-Rallycross-Championship">WRX Lydden Hill</a>
                                        </li>
                                        <li rel="Spectator safety" data-summary="Top tips for watching live motor sport events" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Events/Spectator-Safety">Spectator safety</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle18">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText18"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Competitors" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Competitors">Competitors</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Starter Packs" data-summary="If you want to go racing, rallying or karting, you will need one of our starter packs" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Get-Started/Licence-Starter-Packs">Starter Packs</a>
                                        </li>
                                        <li rel="Competition Licences" data-summary="Find out if you need a licence to compete, plus how to apply or renew" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Competitors/Competition-Licences">Competition Licences</a>
                                        </li>
                                        <li rel="Guidance Advice" data-summary="General guidance on your kit and vehicle that you may find useful" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Competitors/Guidance-/-Advice">Guidance / Advice</a>
                                        </li>
                                        <li rel="Coaching" data-summary="Raising standards through a pioneering coaching framework for UK motor sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Development/Coaching">Coaching</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Disabled motor sport" data-summary="Motor sport enables everyone, whether able-bodied or disabled, to compete against each other on a level playing field. Find out how you can get involved regardless of your disability" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Competitors/Disabled-motor-sport">Disabled motor sport</a>
                                        </li>
                                        <li rel="Login" data-summary="" class="subnav hasChildren">
                                            <a href="http://members.msauk.org" target="_blank">Login</a>
                                        </li>
                                        <li rel="Resource Centre" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a
                                                href="https://www.msauk.org/Resource-Centre/Competitors-/-Licensing">Resource Centre</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle19">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText19"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Marshals" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Marshals">Marshals</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Overview"
                                            data-summary="The orange army is the power behind UK motor sport" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Marshals/Overview">Overview</a>
                                        </li>
                                        <li rel="Training" data-summary="Find out about the training that helps make UK marshals the best in the world" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Marshals/Training">Training</a>
                                        </li>
                                        <li rel="ThanksMarshal" data-summary="The marshalling mascot who rubs shoulders with the stars and their cars" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Marshals/ThanksMarshal">#ThanksMarshal</a>
                                        </li>
                                        <li rel="Login" data-summary="" class="subnav hasChildren">
                                            <a href="http://members.msauk.org" target="_blank">Login</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Resource centre" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Marshals">Resource centre</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle21">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText21"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Officials" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Officials">Officials</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Roles Training"
                                            data-summary="Motor sport relies on thousands of highly trained officials to uphold the rules, ensuring safe and fair competition for all" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Officials/Roles-Training">Roles &amp; Training</a>
                                        </li>
                                        <li rel="Login" data-summary="" class="subnav hasChildren">
                                            <a href="http://members.msauk.org" target="_blank">Login</a>
                                        </li>
                                        <li rel="Resource centre" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Officials">Resource centre</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle22">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText22"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Get Started" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Get-Started">Get Started</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="FAQ" data-summary="Our frequently asked questions are a great starting point for those looking to get involved in the exciting world of motor sport" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Get-Started/FAQ">FAQ</a>
                                        </li>
                                        <li rel="Types of Motor Sport" data-summary="Find out about the various disciplines of motor sport, from racing, rallying and karting to sprints, hill climbs, trials and more" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/Types-of-Motor-Sport">Types of Motor Sport</a>
                                        </li>
                                        <li rel="Starter Packs" data-summary="If you want to go racing, rallying or karting, you will need one of our starter packs" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Get-Started/Licence-Starter-Packs">Starter Packs</a>
                                        </li>
                                        <li rel="Club Motorsport" data-summary="There are local motor clubs across the country and joining yours is the easiest and most cost effective ways to get involved in the sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Get-Started/Club-Motorsport">Club Motorsport</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Costs" data-summary="Deep pockets are not always necessary and there really is something for everyone, regardless of your budget" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Get-Started/Costs">Costs</a>
                                        </li>
                                        <li rel="Volunteering" data-summary="Join a like-minded community of motor sport enthusiasts and get the best seat in the house" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Get-Started/Volunteering">Volunteering</a>
                                        </li>
                                        <li rel="Association of Racing Drivers Schools" data-summary="" class="subnav hasChildren">
                                            <a href="http://www.ards.co.uk" target="_blank">Association of Racing Drivers Schools</a>
                                        </li>
                                        <li rel="British Association of Rally Schools" data-summary="" class="subnav hasChildren">
                                            <a href="http://www.rallyschools-bars.co.uk/" target="_blank">British Association of Rally Schools</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Association of Racing Kart Schools" data-summary="" class="subnav hasChildren">
                                            <a href="http://www.arks.co.uk/" target="_blank">Association of Racing Kart Schools</a>
                                        </li>
                                        <li rel="Association of Hillclimb Sprint Schools" data-summary="" class="subnav hasChildren">
                                            <a href="http://ahass.co.uk/" target="_blank">Association of Hillclimb &amp; Sprint Schools</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle20">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText20"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Development" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Development">Development</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="MSA Academy" data-summary="The talent development pathway for the most promising young drivers in UK motor sport" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Development/MSA-Academy/MSA-Academy">MSA Academy</a>
                                        </li>
                                        <li rel="Go Motorsport" data-summary="The MSA initiative to boost local motor clubs and get more people involved in grassroots motor sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Development/Go-Motorsport/Go-Motorsport">Go Motorsport</a>
                                        </li>
                                        <li rel="Club Development" data-summary="How the MSA can help your club to promote its activities and recruit new members" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Clubs/Club-Development">Club Development</a>
                                        </li>
                                        <li rel="Coaching" data-summary="Raising standards through a pioneering coaching framework for UK motor sport" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Development/Coaching">Coaching</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Motorsports in Schools" data-summary="Get your school involved in motor sport through a number of great initiatives that can aid learning and development" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/The-Sport/CSR/Education">Motorsports in Schools</a>
                                        </li>
                                        <li rel="Women in Motorsport" data-summary="Motor sport is one of few sports that allow men and women to compete against each other on a level playing field" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Development/Women-in-Motorsport">Women in Motorsport</a>
                                        </li>
                                        <li rel="Regional Training" data-summary="How the MSA helps to develop motor sport governing bodies across the globe" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Development/FIA-Institute-Regional-Training-Provider" >Regional Training</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle24">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText24"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li rel="Resource Centre" data-summary="" class="subnav hasChildren">
                            <a href="https://www.msauk.org/Resource-Centre">Resource Centre</a>
                            <ul class="subNav">
                                <li>
                                    <ul class="subNavColumn">
                                        <li rel="Competitors Licensing" data-summary="Forms and documents" class="subnav first hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Competitors-/-Licensing">Competitors / Licensing</a>
                                        </li>
                                        <li rel="Marshals" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Marshals">Marshals</a>
                                        </li>
                                        <li rel="Officials" data-summary="Forms and documents"
                                            class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Officials">Officials</a>
                                        </li>
                                        <li rel="Clubs Organisers" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Clubs-Organisers">Clubs &amp; Organisers</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="Route Authorisation" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Route-Authorisation">Route Authorisation</a>
                                        </li>
                                        <li rel="Championships" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Championships">Championships</a>
                                        </li>
                                        <li rel="Technical: Car" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Technical-Car">Technical: Car</a>
                                        </li>
                                        <li rel="Technical: Kart" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Technical-Kart">Technical: Kart</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="MSA Trainers" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/MSA-Trainers/MSA-Trainers">MSA Trainers</a>
                                        </li>
                                        <li rel="Tenders" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Current-invitations-to-tender">Tenders</a>
                                        </li>
                                        <li rel="Media" data-summary="Forms documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Media">Media</a>
                                        </li>
                                        <li rel="Policies Guidelines" data-summary="Forms and documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/Policies-Guidelines">Policies &amp; Guidelines</a>
                                        </li>
                                    </ul>
                                    <ul class="subNavColumn">
                                        <li rel="National Court reports" data-summary="Forms documents" class="subnav hasChildren">
                                            <a href="https://www.msauk.org/Resource-Centre/National-Court-reports">National Court reports</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="subNavBox">
                                    <ul class="subNavSummary">
                                        <li class="navSummaryTitle" id="navSummaryTitle327">News publications</li>
                                        <li class="navSummaryText" id="navSummaryText327"></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--<li rel="Blog" data-summary="" class="subnav selected hasChildren">
                            <a href="#" >Blog</a>
                        </li>-->
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
        </div>
        <div id="MAIN_movingArea" class="movedup">
            <div id="MAIN_container">
                <div id="MAIN_nudgeArrow" class="up"></div>
                <div id="MAIN_breadcrumbContainer">
                    <div id="MAIN_breadcrumbContent">
                        <div id="breadcrumbs">
                            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                            <div class="breadcrumb"> </div>
                        </div>
                    </div>
                </div>