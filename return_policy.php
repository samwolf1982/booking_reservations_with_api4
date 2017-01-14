<?php

            require_once __DIR__ . '/vendor/autoload.php';

            require_once   __DIR__ . '/api/db/connection.php';

           // include_once('/api/api/HotelsPro.php');
          
          $user_search=session_get();
         // var_dump($user_search);
           // if(is_null($user_search)) {die('redirect empty sesion');}//die('redirect empty sesion');
            use CosmosLibs\Hotels as Hotels;

            ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title>BookingRoll | Tatil, Her zaman!</title>

    <meta charset="utf-8">

    <meta name = "format-detection" content = "telephone=no" />

    <?php include ('includes/php/head.php'); ?>
    <link rel="stylesheet" href="includes/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/css/pgwslideshow.min.css">
    <link rel="stylesheet" href="includes/css/hotels.min.css">
    <link rel="stylesheet" href="includes/css/lightgallery.css">
</head>






<script type="text/javascript">

    $( function() {

        function log( message ) {

            $( "<div>" ).text( message ).prependTo( "#log" );

            $( "#log" ).scrollTop( 0 );

        }



        $( "#location_for_search" ).autocomplete({

            source: function( request, response ) {

                $.ajax( {

                    url: "http://gd.geobytes.com/AutoCompleteCity",

                    dataType: "jsonp",

                    data: {

                        q: request.term

                    },

                    success: function( data ) {



            // Handle 'no match' indicated by [ "" ] response

            response( data.length === 1 && data[ 0 ].length === 0 ? [] : data );

        }

    } );

            },

            minLength: 3,

            select: function( event, ui ) {

                log( "Selected: " + ui.item.label );

            }

        } );

    } );

</script>

<!--

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>

<script type="text/javascript">

function initialize() {

    var options = {

        types: ['geocode']

    };

    var input = document.getElementById('location_for_search');

    var autocomplete = new google.maps.places.Autocomplete(input);

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

-->

<body class="" id="top">

    <!--==============================header=================================-->

    <?php include ('includes/php/navmenu.php'); ?>

    <!--==============================main info=================================-->

    <div class="search_hotel_block">







        <style type="text/css">
            
            .panel-heading{
                max-height: 3em;
            
            }
              .panel-title{
                margin: 0;
                padding: 0;
              }
        </style>
<div class="container">
            <div class="head">
                <h2> Terms & Conditions</h2>
                 <h3>TERMS OF USE </h3>
                
<p>THIS IS A LEGAL AGREEMENT. BY ACCESSING THIS WEB SITE OR USING ANY SERVICE PROVIDED HEREIN, YOU ACCEPT AND AGREE TO BE BOUND BY ALL THE TERMS AND CONDITIONS OF THIS AGREEMENT. PLEASE READ THIS ENTIRE AGREEMENT CAREFULLY BEFORE ACCEPTING ITS TERMS.</p>
                <p>
                      <dl>
   <dt>A) GENERAL TERMS AND CONDITIONS</dt>
     <dd>
         <ol>
             <li><strong> Parties:</strong> The parties to this Agreement are you, a visitor to this web site ("You"),and the owner and operator of this web site: Polatkan Tourism Ltd, a limited liability company. All references to "us", "this web site" or "this site" shall be construed to mean Polatkan Tourism Ltd. If the user is not an individual, then "You" means Your Company, its officers, members, agents, successors and assigns.</li>
             <li><strong> Assent To Terms of Use And Amendment: </strong>Polatkan Tourism Ltd grants a nonexclusive, non-transferable, and revocable license to You and provides the services available at this site to You subject to the following terms and conditions. WE MAY AMEND THESE TERMS AND CONDITIONS FROM TIME TO TIME WITHOUT NOTICE TO YOU. YOU CAN REVIEW THE MOST CURRENT VERSION OF THE TERMS AND CONDITIONS AT ANY TIME AT http://www.bookingroll.com. IN ADDITION, WHEN USING PARTICULAR SERVICES IN THIS SITE, GUIDELINES OR RULES MAY BE POSTED WHICH ARE APPLICABLE TO YOUR USE OF THOSE SERVICES. YOUR USE OF THIS SITE AND YOUR RELATIONSHIP WITH www.bookingroll.com. ARE SUBJECT TO ALL GUIDELINES OR RULES THAT MAY BE POSTED FROM TIME TO TIME ON THE SITE, WHICH ARE ALL INCORPORATED BY REFERENCE INTO THIS AGREEMENT. BY USING THIS SITE, YOU ARE AGREEING TO BE BOUND BY ALL OF THE TERMS AND CONDITIONS OF THE MOST CURRENT VERSION OF THE USER AGREEMENT AND ANY GUIDELINES AND RULES POSTED ON THIS SITE. IF YOU DO NOT AGREE TO BE BOUND BY THIS AGREEMENT, DO NOT USE THIS SITE.</li>

             <li><strong>Entire Agreement:</strong>  This "TERMS OF USE" Agreement will be expressly incorporated by reference in each and every agreement between you and Polatkan Tourism Ltd. It supersedes any and all prior and existing agreements, whether oral or in writing, between You and Polatkan Tourism Ltd with respect to the subjects addressed in this "TERMS OF USE" Agreement and constitutes the entire agreement between the parties with respect to those subjects. You acknowledge that neither Polatkan Tourism Ltd nor anyone on Polatkan Tourism Ltd`s behalf has made any representations, inducements, promises or agreements, orally or otherwise, to You relating to the subjects addressed by this "TERMS OF USE" Agreement that are not embodied herein.</li>

 <li><strong>Prohibited Conduct:</strong> You agree (i) not to use this site to upload or distribute in any way files that contain viruses, corrupted files, or any other similar software or programs that may damage the operation of another`s computer; (ii) not to interfere or disrupt this site or any networks connected to this site; (iii)not to use any device, software or routine or attempt to interfere with the proper functioning of this site or any transactions being offered at this site; (iv) not to take any action that imposes an unreasonable or disproportionately large load on Polatkan Tourism Ltd`s infrastructure; (v) not to use this site to collect or harvest personal information, including, without limitation, financial information, about other participants at this site; and (vi) not to impersonate any person or entity or falsely state or otherwise misrepresent Your affiliation with a person or entity. You agree not to use the services, products, or downloads available at this site for illegal purposes, and to comply with all regulations, policies and procedures of networks connected to this site.</li>
 <li><strong>Compliance with Laws:</strong> You shall comply with all applicable laws and regulations of the Northern Cyprus and foreign authorities relating to any service, product, or download associated with this site.</li>
 <li><strong>Software License(s):</strong> You may acquire software from Polatkan Tourism Ltd by download from this site, or otherwise directly from Polatkan Tourism Ltd., or indirectly from a third-party distributor, reseller, or agent of Polatkan Tourism Ltd. You agree that your use of such software shall be strictly in accordance with the applicable license agreement(s).</li>
 <li><strong>Registration Data And Privacy:</strong> Registration may be required for you to download content from this site, or for your participation in certain services offered at this site. You must provide certain current, complete, and accurate information about You as prompted to do so by the registration form ("Registration Data") and maintain and update such registration information as required to keep such information current, complete and accurate You warrant that such data is accurate and current, and that you are authorized to provide such data. You authorize us to verify such data at any time. If any registration data that You provide is untrue, inaccurate, not current or incomplete, Polatkan Tourism Ltd retains the right, in its sole discretion, to suspend or terminate rights to use the services. Registration Data and certain other information about you are subject to our Privacy Policy, which may be accessed from the www.bookingroll.com online bookings page. Solely to enable Polatkan Tourism Ltd to use information You supply us internally, so that we are not violating any rights You might have in that information, You grant to Polatkan Tourism Ltd nonexclusive license to (i) convert such information into digital format such that it can be read, utilized and displayed by Polatkan Tourism Ltd computers or any other technology currently in existence or hereafter developed capable of utilizing digital information, and (ii) combine the information with other content provided by Polatkan Tourism Ltd, in each case by any method or means or in any medium whether now known or hereafter devised.</li>
 <li><strong>Age and Responsibility:</strong> You represent that You are of sufficient legal age to create binding legal obligations and to be responsible for any contractual and/or financial liabilities that You may incur as a result of the use of this web site. You understand that You are financially responsible for all uses of this web site by You and/or those using your login name and password. Should You have lost or become aware that an unauthorized person may have access to your login name and/or password, contact us immediately.</li>
<li><strong>Posting of Digital Files And/Or Communications: </strong>If this web site should at anytime provide any service which enables visitors post digital files and/or to communicate with or otherwise share information with other visitors or persons providing any kind or service to visitors, You agree not to submit, publish, display, disseminate, or otherwise communicate any defamatory, inaccurate, abusive, threatening, offensive, or illegal material while connected to or otherwise directly or indirectly using this web site or other services provided to You by the website. Transmission of such material or any material that violates any law in the Northern Cyprus or anywhere else in the world, is strictly prohibited and shall constitute a material breach of this Agreement entitling this web site to immediately terminate all rights to access to this web site. You are solely responsible for all information, which you submit, publish, display, disseminate or otherwise communicate through this website even if a claim should arise after termination of service. If this web site provides any such service described herein, You agree that all messages and other communications by You shall be deemed to be readily accessible to all other visitors/subscribers who are authorized to access this web site and You agree that all such messages and other communications shall not be deemed to be private or secure.</li>
<li><strong>General: </strong> Regardless of whether this web site provides any type of service described herein, You agree that you have hereby been informed and noticed that any and all messages and other communications which you submit to this web site directly or through this website can be read by the operators and/or other agents of this web site, whether or not they are the intended recipient(s). You agree to be personally liable and fully defend and indemnify this web site for any and all damages directly, indirectly and/or consequentially resulting from your attempted or actual sharing of information or communicating with others through this web site alone, or with or under the authority of, any other person(s), including, without limitation, any governmental agency(ies),wherein such damages include, without limitation, all direct and consequential damages directly or indirectly resulting from sharing of information or communicating with others through this web site including, but not limited to, damages resulting from loss of revenue, loss of property, fines, attorney`s fees and costs, including, without limitation, damages resulting from prosecution and/or governmentally imposed seizure(s), forfeiture(s), and/or injunction(s). At the time of your check in the management of the hotel or car rental company, has the right to require credit card information to guarantee coverage and any additional charges incurred during your stay .</li>
<li><strong>Copyrights:</strong> The copyright in all material provided on this site is owned by Polatkan Tourism Ltd or by Polatkan Tourism Ltd licensor(s) or by others. You acknowledge and agree that this site contains proprietary information that is protected by applicable intellectual property and other laws. You further acknowledge and agree that information presented to You through this site, including text, graphics,logos, icons, images and software, and the arrangement and compilation of such content, are the property of Polatkan Tourism Ltd or its content suppliers or others and is protected by copyrights, trademarks, service marks, patents or other proprietary rights and laws. Polatkan Tourism Ltd does not grant any license or authorization to any user of its copyrightable material or other intellectual property, by placing them on this site. Furthermore, except as stated herein, none of the material may be copied, reproduced, distributed, republished, downloaded, displayed, posted or transmitted in any form or by any means, including, but not limited to, electronic, mechanical, photocopying, recording, or otherwise, without the prior written permission of Polatkan Tourism Ltd or the copyright owner. However, You may print a copy of the information on this site for your personal, non-commercial internal use or records. In so doing, you may not modify the materials and you agree to retain all copyright and other proprietary notices contained in the materials. This permission does not give you any ownership rights in the information and terminates automatically if you breach any of these terms or conditions. If you make any other use of this site, except as otherwise provided herein, you may violate copyright and other laws of the Northern Cyprus and/or copyright and other laws of other countries and may be subject to penalties.</li>
<li><strong>Complains:</strong> You may contact Polatkan Tourism Ltd with complaints regarding allegedly infringing posted material and Polatkan Tourism Ltd will investigate those complaints. If the posted material is believed in good faith by Polatkan Tourism Ltd to violate any applicable law, Polatkan Tourism Ltd will remove or disable access to any such material and Polatkan Tourism  Ltd. will notify the posting party that the material has been blocked or removed. In any event, if a problem persists, you should complain in writing to the office, with a particular letter, within 7 days of your return to Northern Cyprus. The application must always be accompanied by the relevant documents / certificates. Late applications or applications not accompanied by the appropriate supporting documents / certificates will not be taken into account.</li>
<li><strong>Trademarks:</strong> The trademarks, service marks, and logos (the "Trademarks") used and displayed on this site are registered and unregistered Trademarks of Polatkan Tourism Ltd. and others. Nothing on this site should be construed as granting, by implication, estoppels, or otherwise, any license or right to use any Trademark displayed on the site, without the written permission of the Trademark owner. Polatkan Tourism Ltd. aggressively enforces its intellectual property rights to the fullest extent of the law. The Trademark(s) may not be used in any way, including in advertising or publicity pertaining to distribution of materials on this site, without prior, written permission. Polatkan Tourism Ltd prohibits the use of any of the foregoing names or marks as a metatag or as a "hot" link to any Polatkan Tourism Ltd site unless Polatkan Tourism Ltd approves establishment of such a link in advance in writing. If you have any questions regarding any Trademarks on the site, please contact Polatkan Tourism Lt</li>
<li><strong>Links:</strong> This site may provide links to other Internet sites. Polatkan Tourism Ltd. is not responsible for the availability of such other sites and does not endorse and is not responsible or liable for any content, products or other materials available on such other sites. Links to external web sites do not constitute an endorsement by Polatkan Tourism Ltd. of those sites or the sponsors of such sites or the content, products, advertising or other materials presented on such sites. Further, Polatkan Tourism Ltd reserves the right to terminate any link or linking program at any time. Polatkan Tourism Ltd. does not author, edit, or monitor these unofficial pages or links. You further acknowledge and agree that Polatkan Tourism Ltd. shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any information, goods or services available on or through any such site. If You decide to access any of the third party sites linked to this site, you do this entirely at your own risk.</li>
<li><strong>Participation In Promotions Of Advertisers:</strong> You may enter into correspondence with or participate in promotions of advertisers promoting their products or services on this site ("Advertisers"). You  acknowledge and agree that any such correspondence or participation, including the delivery of and the payment for goods and services, and any other terms, conditions, warranties or representations associated with such correspondence or promotions, are solely between You and Advertiser. www.bookingroll.com shall have no liability, obligation or responsibility whatsoever arising out of or in connection with any such correspondence or participation or transactions.</li>
<li><strong>Monitoring:</strong> You acknowledge that Polatkan Tourims Ltd. or its designee`s reserves the right to, and may (from time to time) monitor any and all activity or information transmitted or received through this site. Polatkan Tourism Ltd., in its sole discretion and without further notice to You, may (but is not obligated to) review, censor or prohibit any activity or the transmission or receipt of any Information which Polatkan Tourism Ltd. deems inappropriate (such as that specified in above) or that violates any term or condition of this Agreement. During monitoring, information may be examined, recorded, copied, and used for authorized purposes. Use of this site, authorized or unauthorized, constitutes consent to such monitoring. Unauthorized uses and unauthorized users of this site will be prosecuted to the full extent of the law.</li>
<li><strong>NO WARRANTIES:</strong> THIS SITE AND ALL INFORMATION CONTAINED ON THIS SITE, AND EXCEPT TO THE EXTENT EXPRESSLY PROVIDED IN A LICENSE AGREEMENT FOR SOFTWARE OR CONTENT, ALL GOODS AND SERVICES OBTAINED THROUGH THIS SITE, ARE PROVIDED ON AN "AS IS" BASIS FROM POLATKAN TOURISM LTD. AND ITS INFORMATION PROVIDERS, POLATKAN TOURISM LTD. AND ITS AFFILIATES AND CONTENT PROVIDERS. MAKE NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, RELATING TO THIS AGREEMENT, THE PERFORMANCE UNDER THIS AGREEMENT, THE SERVICES AVAILABLE ON THIS SITE, THE OPERATION OF THE SOFTWARE AVAILABLE ON THIS SITE, THE TRANSACTIONS PERFORMED ON THIS SITE, OR THE INFORMATION, CONTENT, MATERIALS AND/OR PRODUCTS INCLUDED ON THIS SITE TO THE FULLEST EXTENT PERMISSIBLE BY APPLICABLE LAW, EACH OF POLATKAN TOURISM LTD. AND Polatkan Tourism Ltd.`s AFFILIATES AND CONTENT PROVIDERS DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED,INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND/OR NON-INFRINGMENT. WITHOUT LIMITING THE FOREGOING,NONE OF POLATKAN TOURISM LTD. NOR POLATKAN TOURISM LTD`s AFFILIATES OR CONTENT PROVIDERS MAKES ANY WARRANTY THAT (i) THE GOODS OR SERVICES OFFERED ON THIS SITE WILL MEET YOUR REQUIREMENTS,(ii) THE GOODS OR SERVICES OFFERED ON THIS SITE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE, (iii) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE GOODS OR SERVICES WILL BE ACCURATE OR RELIABLE, (iv) THE CONTENT OR INFORMATION AVAILABLE ON THIS SITE IS COMPLETE, ACCURATE OR AVAILABLE, OR (v) THE QUALITY OF ANY PRODUCTS, SERVICES,INFORMATION, OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU THROUGH THE SERVICES WILL MEET YOUR EXPECTATIONS. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM POLATKAN TOURISM LTD OR THROUGH THIS SITE SHALL CREATE ANY WARRANTY NOT EXPRESSLY MADE HEREIN.</li>
<li><strong>LIMITED LIABILITY: </strong>POLATKAN TOURISM LTD. AND ALL OF POLATKAN TOURISM LTD AFFILIATES AND CONTENT PROVIDERS AND THEIR RESPECTIVE SHAREHOLDERS AND AFFILIATES SHALL NOT BE LIABLE FOR ANY LOSS OF BUSINESS, LOSS OF USE OR OF DATA, INTERRUPTION OF BUSINESS,LOST PROFITS OR GOODWILL, OR OTHER INDIRECT, SPECIAL,INCIDENTAL, EXEMPLARY OR CONSEQUENTIAL DAMAGES OF ANY KIND ARISING OUT OF THIS AGREEMENT, EVEN IF THEY HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH LOSS AND WHETHER OR NOT THEY HAD ANY KNOWLEDGE, ACTUAL OR CONSTRUCTIVE, THAT SUCH DAMAGES MIGHT BE INCURRED, AND NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY. THIS EXCLUSION INCLUDES ANY LIABILITY THAT MAY ARISE OUT OF THIRD-PARTY CLAIMS AGAINST YOU. YOU AGREE THAT REGARDLESS OF ANY STATUTE OR LAW TO THE CONTRARY, ANY CLAIM OR CAUSE OF ACTION ARISING OUT OF OR RELATED TO USE OF THE GOODS OR SERVICES PROVIDED ON THIS SITE OR THIS AGREEMENT MUST BE FILED WITHIN ONE (1) MONTH AFTER SUCH CLAIM OR CAUSE OF ACTION AROSE OR BE FOREVER BARRED. YOU FURTHER AGREE IF YOU BECOME ENTITLED TO ANY RECOVERY, THAT YOUR RECOVERY SHALL BE LIMITED TO THE AMOUNT OF FEES OR PAYMENTS MADE TO POLATKAN TOURISM LTD IF ANY, FOR THE SERVICE, SOFTWARE OR CONTENT AT ISSUE.</li>
<li><strong>Indemnity:</strong> You shall indemnify, defend, and hold harmless Polatkan Tourism Ltd and its content providers and their respective shareholders, affiliates, employees, agents, successors, officers, and assigns, from any suits, losses, claims, demands, liabilities , costs and expenses (including attorney and accounting fees) that they may sustain or incur arising from (i) Your use of the software available at or downloaded from this site, (ii) Your failure to comply with any applicable laws and regulations (including without limitation those regarding the export of products or technology abroad) or to obtain any licenses or approvals from the appropriate government agencies necessary to purchase or sell the subject goods and services, (iii) Your use of the content available on this site in any way contrary to this agreement (iv) Your breach of any of Your representations, warranties or obligations set forth in this agreement, (v) the sale, purchase, transportation, delivery, use or disposal of any Polatkan Tourism Ltd. service, product, or download associated with this site or available through other sites, or any loss suffered by or harm to any person or property in any way relating to of caused in whole or in part by Your use of this site or any service, product, or download associated with this site (including, without limitation, any personal injuries or death of any third person caused in whole or in part by such products or services, the use, transportation, delivery, storage, handling or release thereof), and (vi) any taxes attributable to the relating to any service, product, or download associated with this site</li>
<li><strong>Beneficiaries of this Agreement;</strong> No Other Agreements: The rights and limitations in this agreement are for the benefit of Polatkan Tourism Ltd. and each of Polatkan Tourism Ltd. content providers, each of which shall  have the right to enforce its rights hereunder directly and on its own behalf.</li>
<li><strong>Termination: </strong>You agree that Polatkan Tourism Ltd. may, at its sole discretion, deny You access to the site and disable any login name and password associated with You for any reason, including, without limitation, if Polatkan Tourism Ltd. believes that You have violated or acted inconsistently with the letter or spirit of this Agreement. Polatkan Tourism Ltd reserves the right at any time and from time to time to modify or discontinue, temporarily or permanently, the services offered under this site (or any part thereof) with or without notice. You agree that Polatkan Tourism Ltd. shall not be liable to You or to any third party for any modification, suspension or discontinuance of the services offered under this site.</li>
<li><strong>Applicable law and jurisdiction: </strong>This Agreement shall be governed and construed and interpreted in accordance with the Laws in the Northern Cyprus and both parties submit to the jurisdiction of the courts of the Northern Cyprus.</li>
         </ol>

     </dd>

   <dt>B) FLIGHTS and/or BUDGET FARES</dt>
     <dd>
     <p>
         Air transportation is subject to the individual terms of the individual air carriers, which are incorporated herein by reference and made part of the contract of carriage. Incorporated terms may include, but are not limited to:
         <ol>
<li>Liability limitations for personal injury or death.</li>
<li>Baggage liability limitations. </li>                                               
 <li>Overbooking of flights and compensation schemes.</li>
 <li>The right of the carriers to change the terms of the contract.</li>
 <li>The right of the carriers to change schedules without notice.</li>
 <li>Rules on reconfirmation, check-in times.</li>

         </ol>
 
<p>
You have the right to inspect the full text of each carrier`s applicable terms at its airport and city ticket offices.
</p>
     </p>
         </dd>
   <dt>NOTICE AND CONTRACT OF CARRIAGE:</dt>
   <dd><p>If the passenger`s journey involves an ultimate destination or stop in a country other than the country of departure the Warsaw Convention may be applicable and the Convention governs and in most cases limits the liability of carriers for death or personal injury and in respect of loss of or damage the baggage. See also notices headed "Advice to International Passengers on Limitation of Liability", "Notice of Baggage Liability Limitations" and other Notices.</p></dd>

    <dt>Conditions of contract:</dt>
   <dd><p>As used in the contract "ticket" means this passenger ticket and baggage check, or this itinerary/receipt if applicable, in the case of an electronic ticket, of which these conditions and the notices form part, "carriage" is equivalent to "transportation", "carrier" means all air carriers that carry or undertake to carry the passenger or his baggage hereunder or perform any other service incidental to such air carriage, "electronic ticket" means the Itinerary/Receipt issued by or on behalf of Carrier, the Electronic Coupons and, if applicable, a boarding document. "WARSAW CONVENTION" means the Convention for the Unification of Certain Rules Relating to International Carriage by Air signed at Warsaw, 12th October 1929, or that Convention as amended at The Hague, 28th September 1955, whichever may be applicable. Carriage hereunder is subject to the rules and limitations relating to liability established by the Warsaw Convention unless such carriage is not "international carriage" as defined by the Convention. For carriage wholly within the UK the provisions of the Carriage by Air Act 1961 and Orders made there under apply. To the extent not in conflict with the foregoing, carriage and other services performed by each carrier are subject to: (I) provisions contained in ticket, (II) applicable tariffs, (III) carrier`s conditions of carriage and related regulations which are made part hereof (and are available on application at the offices of carrier), except in transportation between a place in the United States or Canada and any place outside thereof to which tariffs in force in those countries apply. o Carrier`s name may be abbreviated in the ticket, the full name and the abbreviation being set forth in carrier`s tariffs, conditions of carriage, regulations or timetables; carrier`s address shall be the airport of departure showing opposite the first abbreviation of carrier`s name in the ticket; the agreed stopping places are those places set forth in this ticket or as shown in carrier`s timetables as scheduled stopping places of the passenger`s route; carriage to be performed hereunder by several successive carriers is regarded as a single operation. An air carrier issuing a ticket for carriage over the lines of another carrier does so only as its Agent. Any exclusion or limitation of liability of carrier shall apply to and be for the benefit of agents, servants and representatives of carrier and any person whose aircraft is used by carrier for carriage and its agents, servants and representatives. Checked baggage will be delivered to bearer of the baggage check. In case of damage to baggage moving in international transportation complaint must be made in writing to carrier forthwith after discovery of damage and, at the latest, within 7 days from receipt; in case of delay, complaint must be made within 21 days from the date the baggage was delivered. See tariffs or conditions of carriage regarding non-international transportation. This ticket is good for carriage for one year from date of issue, except as otherwise provided in this ticket, in carrier`s tariffs, conditions of carriage, or related regulations. The fare for carriage hereunder is subject to change prior to commencement of carriage. Carrier may refuse transportation if the applicable fare has not been paid. Carrier undertakes to use its best efforts to carry the passenger and baggage with reasonable dispatch. Times shown in timetables or elsewhere are not guaranteed and form part of this contract. Carrier may without notice substitute alternate carriers or aircraft, and may alter or omit stopping places shown on the ticket in case of necessity. Schedules are subject to change without notice. Carrier assumes no responsibility for making connections. Passenger shall comply with Government requirements, present exit, entry and other required documents and arrive at the airport by the time fixed by carrier or, if no time is fixed, early enough to complete departure procedures. No agent, servant or representative of carrier has authority to alter, modify or waive any provision of this contract. Carrier reserves the right to refuse carriage to any person who has acquired a ticket in violation of applicable law or carrier`s tariffs, rules or regulations. Issued by the carrier whose name is in the "Issued By" section or on the face of the Passenger Ticket and Baggage Check.</p></dd> 

   <dt>SOLD SUBJECT TO TARIFF REGULATIONS. </dt>
   <dd><p> Advice to international passengers on limitation of liability: Passengers on a journey involving an ultimate destination or a stop in a county other than the country of origin are advised that the provisions of a treaty known as the Warsaw Convention may be applicable to the entire journey, including any portion entirely within the country of origin or destination. For such passengers on a journey to, from, or with an agreed stopping place in the United States of America, the Convention and special contracts of carriage embodied in applicable tariffs provide that the liability of certain carriers, parties to such special contracts, for death of or personal injury to passengers is limited in most cases to proven damages not to exceed U.S.$ 75,000 per passenger, and that this liability up to such limit shall not depend on negligence on the part of the Carrier. For such passengers travelling by a carrier not a party to such special contracts or on a journey not to, from, or having an agreed stopping place in the United States of America, liability of the carrier for death or personal injury to passengers is limited in most cases to approximately U.S.$ 10,000 or U.S.$20,000. The names of carriers, parties to such special contracts, are available at all ticket offices of such carriers and may be examined on request. Additional protection can usually be obtained by purchasing insurance from a private company. Such insurance is not affected by any limitation of the carrier`s liability under the Warsaw Convention or such special contracts of carriage. For further information please consult your airline or insurance company representative. NOTE: The limit of liability of U.S.$ 75,000 above is inclusive of legal fees and costs except that in case of a claim brought in a state where provision is made for separate award of legal fees and costs, the limit shall be the sum of U.S.$ 58,000 exclusive of legal fees and costs.</p></dd>   

   <dt>Notice of baggage liability limitations:</dt>
   <dd><p>Liability for loss, delay or damage to baggage is limited unless a higher value is declared in advance and additional charges are paid. For most international travel (including domestic portions of international journeys) the liability limit is approximately U.S.$ 9.07 per pound (U.S.$ 20.00 per kilo) for checked baggage and U.S.$ 400 per passenger for unchecked baggage. For travel wholly between U.S. points, Federal require any limit on an airline`s baggage liability to be at least U.S.$ 1,250 per passenger. Excess valuation may be declared on certain types of articles. Some carriers assume no liability for fragile, valuable or perishable articles. Further information may be obtained from the carrier.<br/>
Cabin baggage – Important notice:<br/>
For security and safety reasons only one piece of hand baggage, which must not be larger than 20"x15"x10", will normally be allowed in the cabin.<br/>
The following additional items are also allowed:<br/>
One small size handbag/purse. /  One coat or one cape or one blanket. / One umbrella or one walking stick.<br/>
One pair of crutches. / One small camera/binoculars.<br/>
An infant`s carrying basket or invalid`s fully collapsible wheelchair, which are carried free of charge, will normally be carried in the cargo department.<br/>
Notice of Government imposed taxes, fees and charges:<br/>
The price of this ticket may include taxes, fees and charges, which are imposed on air transportation by government authorities. These taxes, fees and
charges, which may represent a significant portion of the cost of air travel, are either included in the fare, or shown separately in the "TAX" box(es) of this ticket. You may also be required to pay taxes, fees or charges not already collected. Important notice: Special fare restrictions:
Many "special" fares are issued subject to conditions which may restrict or prohibit any change of booking and may limit the amount of any refund due in the event of cancellation or failure to travel.<br/>
Insurance cover is available in certain circumstances and You should contact your airline office or travel agent for details. Important – Security notice:<br/>
-Always use your own bag and pack it yourself.<br/>
- Never leave it unattended.<br/>
-Never check bags in for other people, or carry something onto an aircraft for someone else.
-Check-in staff will ask you questions about your baggage. <br/>                                                                                                                             - It is a criminal offence to give false information.</p></dd>   

   <dt>Notice – Overbooking of flights:</dt>
   <dd><p> Airline flights may be overbooked. Airlines make every effort to provide seats for which confirmed reservations have been made but no absolute guarantee of seat availability is denoted by the expressions reservations, bookings, status OK and the timings attached to them. Most Airlines operate compensation schemes on certain routes for passengers with confirmed reservations who are unjustifiably denied carriage because of non-availability of seats and details of these schemes are available at check-in
Reconfirmation notice:
Some Airlines require reconfirmation of your reservations. Contact the transporting air carrier for the applicable requirements.
Dangerous Articles in Baggage:
For safety reasons, dangerous articles such as those listed below, must not be carried in passengers` baggage.
<br>
o Compressed gases – (Deeply refrigerated flammable, non-flammable and poisonous) such as butane, oxygen, liquid nitrogen, aqualung cylinders.<br>
o Corrosives such as acids, alkalis, mercury and wet cell batteries.<br>
o Explosives, munitions, fireworks and flares.<br>
o Flammable liquids and solids, such as lighter
fuel, MATCHES, paints, thinners, fire-lighters.<br>
o Radioactive materials.<br>
o Brief-cases and attaché cases with installed alarm devices.<br>
o Oxidizing materials such as bleaching powder, peroxides.<br>
o Poisons and infectious substances such as insecticides, wee-killers and live virus materials.<br>
o Other dangerous articles such as magnetized material, offensive or irritating materials.<br>
Medicines and toiletries in limited quantities which are necessary or
appropriate for the passenger during the journey, such as hair sprays, perfumes and medicines containing alcohol may be carried. Many of these listed articles can be carried as air cargo provided they are packed in accordance with cargo regulations.</p></dd>   

   <dt>PRICES:</dt>
   <dd><p>
       All prices:<br/><br/>
-Are inclusive of the base fare and the applicable taxes.<br/>
-Are in Euro (EUR) unless otherwise provided.<br/>
- Are accurate at the time of booking.<br/>
If taxes, fees or charges are introduced or increased the cost of the flight may be increased to cover this. Once the full price has been paid and tickets have been issued we will not increase the price to be paid by You unless the carrier also incre
   </p></dd>   

   <dt>FARE RULES AND REGULATIONS:</dt>
   <dd><p>The passenger is advised of all important fare rules and regulations. Special attention should be paid to the so-called "low cost" fares and/or special offers, which are accompanied by substantial restrictions according to each carrier`s tariff. A selection of such restrictions may include, but is not limited to:<br>
- VALID ONLY ON (airline code): This rule means that the listed fare is only applicable to the airline indicated and not on other airlines.<br>
-NON-REF: This rule means that the fare is not refundable under any circumstances. In case the very same traveler does not travel on the exact dates and flights indicated he/she cannot obtain a refund for the said fare. Such fares (tickets) are also not transferable to other travelers.</p></dd> 

  <dt>CHECK RULE FOR CHANGE/CANCEL</dt>
   <dd><p>RESTRICTIONS:<br> According to the carrier`s fare rules and regulations any name and/or flight and/or date changes and/or cancellations/amendments are restricted.<br>
- WAIT LISTING NOT PERMITTED: Self-explanatory.<br>
-LAST DATE TO PURCHASE TICKET: Self-explanatory.<br>
- PAYMENT AND TICKETING MUST BE MADE<br>
WITHIN (NUMBER) HOURS OF RES: The issue of ticket(s) and the payment must be made within a certain time frame from the time the reservation was made.<br>
o <i>APEX/PEX</i> fares: Said fares are advance purchase excursion fares. This means that they have to be purchased a certain number of days prior to the date on which a traveler plans to travel. Their validity is also generally restricted.<br>
o<i> RESTRICTED CHANGES/REFUNDS:</i><br> With regard to restricted changes please see item c. above. A form of refund is permitted although restricted. This is usually in the form of credit towards a higher fare. Other restrictions may involve minimum/maximum stay requirements, non eligibility for infant or child discounts, etc. If the passenger wants to ensure the refund-ability of his/her ticket then he/she must search for refundable fares only.</p></dd> 
   
   <dt>INSURANCE:</dt>
   <dd><p>Adequate insurance cover may exist from insurance companies according to each insurance program`s contract (i.e.,medical expenses, personal injuries, theft, etc.) Through our Other Services module You may book and purchase on line one of our insurance programs. We strongly recommend that You and all members of your party are adequately insured as soon as You make a flight booking</p></dd> 
   
   <dt>PAYMENTS:</dt>
   <dd><p>We shall not accept your booking unless full payment is made by debit or credit card. Cash and cheque options are possible to individuals and/or Travel Agents when effecting a booking and payment in person at our offices. Such cheque payments are subject to clearance through our Bank. Payments by special  agreement are reserved for pre-authorized accounts and/or Travel Agents. Following payment we shall process your booking and advise You accordingly. In case of non-availability we shall recommend alternative options and if not accepted by You we will refund the amount paid by You immediately. GROUPS:
For a group of 10 or more passengers please send your request through our site or call us.</p></dd> 
   
   <dt>CANCELLATIONS AND/OR AMENDMENTS:</dt>
   <dd><p>If after a confirmation has been given you wish to cancel or change your flight arrangements in any way, including name changes, we will do our utmost to effect the changes, to the extent permitted by each carrier`s fare rules and regulations. In all such cases, it is mandatory to receive your written request through our site, or by post, fax or e-mai</p></dd> 
   
   <dt>CHANGES BY US:</dt>
   <dd><p>
There may be occasional and valid reasons, in most cases beyond our control, when changes have to be made and we reserve the explicit right to do so. We will do our utmost to notify You of these changes as soon as they are received by the carrier. If the change is a major one, such as (a) change in the departure time of over 12 hours or (b) change in the departure or arrival airport, we will let You know as soon as possible. In such cases, and to the extent permitted by each carrier, You may accept the change as notified, select an alternative flight and/or cancel your booking.</p></dd> 
   
   <dt>FORCE MAJEURE:</dt>
   <dd><p>
We will not be liable for any changes caused by natural disasters, threats of war, weather conditions, industrial or labour disputes or any similar event(s)beyond our control.</p></dd> 
   
   <dt>FLIGHT DETAILS:</dt>
   <dd><p>
There are occasions when delays may occur. It is your responsibility to reconfirm your flight, departure and return dates and times. In the case of delays announced after You have checked in, most airlines will normally offer the following arrangements:<br>
· Between 4 and 6 hours : Light refreshments and/or a snack.<br>
· Between 6 and 12 hours : A main meal.<br>
· Over 12 hours : Overnight accommodation and overnight kit, if possible.</p></dd> 
   
   <dt>NO SMOKING FLIGHTS:</dt>
   <dd><p>
The majority of carriers do not allow smoking on their flights.<br>
<i>PREGNANCY:</i><br>
If You are pregnant You should check with your doctor whether it is safe for You to travel by air. Normally, if You are more than 32 weeks pregnant airlines insist that You have a medical certificate stating that You are fit to fly. Please contact the carrier direct for further information.</p></dd> 
   
   <dt>CHILDREN AND INFANTS:</dt>
   <dd><p>
Children should be more than 2 but less than 12 years of age. Infants are less than 2 years of age. Age requirements refer to the date of return flight. The system will advise the correct fare for children and/or infants provided a date of birth has been specified. With exceptions, especially applicable (but not limited to) to restrictive and non-refundable fares, You should normally expect a 33% discount for children and a 90% discount for infants.</p></dd> 
   
   <dt>UNACCOMPANIED MINORS:</dt>
   <dd><p>
Carriers normally require special conditions for the transportation of unaccompanied minors (children) and sometimes may apply a surcharge. In such cases an Unaccompanied Minor`s Form needs to be completed and signed by the parent or guardian. In addition a recipient adult relative needs to receive the unaccompanied minor at the arrival airport. Please contact the carrier direct for such cases</p></dd> 
   
   <dt>DISRUPTIVE PASSENGERS:</dt>
   <dd><p>
Depending on carrier`s conditions of carriage, the captain of a flight may refuse boarding to anyone who poses a threat to the safety of the flight or to anyone whose behavior is abusive and/or disruptive to the smooth operation of the flight. BAGGAGE: The normal baggage weight allowance for economy class air travel is 20Kgs per person, excluding infants under 2 years of age. Certain carriers allow infants 10Kgs. Furthermore, most airlines will normally allow 30Kgs for first and/or business class travelers. Air travel to the USA and Canada is governed by the piece system according to which two pieces of baggage of predefined dimensions are allowed per person, excluding infants under 2 years of age. Please check at the time of booking. Should a piece of your baggage fails to arrive or arrives damaged it is essential to report the fact immediately to the carrier`s representative at the airport and complete a Property Irregularity Report (PIR). This sets in motion a tracing procedure and the PIR acts as an essential document should You institute a claim through the carrier or your insurers.</p></dd> 
   
   <dt>EXCESS BAGGAGE WEIGHT:</dt>
   <dd><p>
Normally, special items such as golf clubs, wheelchairs, surfboards, bicycles, cots, etc., can be carried by most carriers but it is advisable to check direct with your airline prior to travel. Baggage in excess of the specified allowance is subject to an excess weight surcharge. Depending on aircraft loads, overweight or oversized items may be refused for air transportation. Such baggage may be carried as normal cargo at lower charges. Please contact the airline direct for further information. CLAIMS:<br>
All claims involving air travel or baggage claims should be addressed to the carrier and not to us.</p></dd> 
   
   <dt>AIR TRANSPORTATION OF LIVE ANIMALS:</dt>
   <dd><p>
Each country has its own entry and exit requirements for live animals (health certificates, vaccinations, quarantine periods, etc). Similarly, each carrier has its own conditions of carriage regarding transportation of animals. Please contact the carrier and the Embassy involved direct for further information.</p></dd> 
   
   <dt>TRAVEL DOCUMENTS( passports, visas, health requirements, etc.):</dt>
   <dd><p>  Each country has its own entry and exit requirements. It is your responsibility to make sure that You and the members of your party have and carry with them all valid travel documents, as necessary.</p></dd> 
<dt>BOOKINGS:</dt>
<dd><p>We accept all bookings made at least 72 hours (or more) prior to departure, subject to carrier`s conditions of carriage. CONFIRMATION, TICKETS, E-TICKETS AND/OR FLIGHT VOUCHERS:
When You book and pay for a flight through this site You will receive an immediate confirmation in the form of a Passenger Name Record (PNR). Subject to carriers` restrictions, rules and regulations regarding the booking of seats and issuance of tickets, we shall then verify payment and issue the tickets within 24 to 72 hours. Where applicable, electronic tickets (e- tickets) or flight vouchers will be sent to the e-mail address provided to us. Ticket numbers of paper/manual tickets are also communicated at the e-mail address provided to us as soon as they are issued. Paper/manual tickets are delivered by courier at the delivery address provided to us and carry a service charge. For Nicosia deliveries please allow 24 hours on working days. For deliveries outside of Nicosia please allow 72 hours on working days. If applicable You must print the e- ticket(s) or Flight Voucher(s) delivered to the e-mail address provided to us (color printer is preferable but black-and white printouts are also acceptable) and present same to the carrier at the airport of departure. In case of printing trouble please contact us immediately for corrective action.</p></dd> 







   <dt>C) HOTEL ACCOMMODATION PRICES</dt>
   <dd><p>All prices:<br>
-Are inclusive of all applicable taxes.<br>
- Are in Euro (EUR) unless otherwise provided.<br>
-Are quoted (unless otherwise provided) to cover room, breakfast and local service charges.<br>
-Are accurate at the time of booking.<br>
Single room prices are based on one adult/child occupancy. Double/twin prices are based on two adults sharing a double/twin room. Double room for single use is permitted. Triple room prices are based on three adults sharing a room with three beds. Purpose built triple bedrooms are limited. The majority of accommodation establishments feature normal size double/twin rooms. The same rooms are used to add a third bed when a third adult is requested or to add a camp bed when child sharing with two adults is requested. Therefore, unless allocated a purpose built triple room, space may be limited in triple rooms or when a child is sharing. Hotels within Disneyland-Paris Theme Park feature purpose built quadruple rooms as standard and prices are on a per room basis. The prices for self-catering apartments are based on a per apartment occupancy with limitations to the maximum number of persons sharing. Any applicable supplements (e.g. half board, full board, sea view, etc.) will be calculated on a per person per night basis, shown separately and added to the basic quotation. If taxes, fees or charges are introduced or increased the cost of the accommodation may be increased to cover this. Once the full price has been paid and the Accommodation Vouchers have been issued we will not increase the price to be paid by You unless the Supplier of the accommodation establish mental so increases the price of the said accommodation.  In this case we reserve the right to pass the additional cost onto You. In certain destinations or even specific hotels may decide to impose local taxes paid by the customer directly to the hotel ( ex. Rome , Amsterdam , Brussels , USA etc. ) . The taxes are changing and vary from country to country and from hotel to hotel . ( ranging from € 1 to €4 per day per room) . Therefore the final update for the exact amount you will pay , should be done only during the final booking. Even some hotels may have fluctuating prices may change daily . The current price will be confirmed that in the time of your final booking. Request a refund based on the fact that the selling price was close to or higher than the price sold at the reception, will not be accepted . MUNICIPAL TAX: Applies in most of the European & America countries and the cost varies depending on the country and city you stay. The fee is per day and is always mandatory payable by the client directly to the hotel of your stay.</p></dd> 
      <dt>CHECK-IN AND CHECK-OUT:</dt>
   <dd><p>
Hotel accommodation prices reflect a 24-hour occupancy of the chosen accommodation. Check-in and check-out times vary from country to country but normal check-in times are between 1 to 2 p.m. whilst check-out times are between 11 to 12 a.m. Earlier check-in or later check-out is possible at the absolute discretion of the accommodation establishment, at an extra cost and subject to availability at the time of firm booking. If in doubt we recommend that You book an additional night.</p></dd> 
      <dt>STARS OR CLASS CATEGORY CLASSIFICATIONS:</dt>
   <dd><p> 
Star ratings and/or class category classifications may vary in quality from country to country and, therefore, cannot be relied upon to identify the quality of the accommodation establishment. A detailed brochure of each accommodation establishment, including photos (if applicable), is provided by the system for your review and check prior to booking and payment.</p></dd> 
      <dt>HOTEL BROCHURES:</dt>
   <dd><p>
Every effort has been made to provide accurate information, including photographs of all accommodation services featured on our site or supplied through our site. In certain cases information and photographs provided by accommodation establishments may differ from actual. All such information is provided by the suppliers. We endeavor to feature accommodation services of commonly acceptable standards reflecting their star rating or class category classification but we are not liable for any misrepresentation in the accuracy of information, descriptions or photographs supplied by third parties. In certain cases accommodation services supplied through our web site may require maintenance or may be non- operational due to adverse weather conditions (e.g. sporting facilities), or may be withdrawn at short notice and without reference to us by the suppliers. If such eventuality materially affects your enjoyment, it is in both our interests for You to advise the local management of the accommodation establishment immediately, get a written report from the management and if corrective action is not taken or your complaint is not dealt with during your stay, contact us upon your return for a complaint follow up. It is understood that accommodation establishments only heat their swimming pools during cold weather and subject to the number of clients in residence. The decision rests entirely with the management of the establishment. While we will request an extra bed, for a third person to share a twin room, and some cases offer a reduction, You may find space limited. We do not accept liability or responsibility should You then consider the accommodation to be overcrowded. Beds for children may not be of full size and could be folding or camp bed in style.</p></dd> 
      <dt>CLAIMS:</dt>
   <dd><p> All claims involving hotel accommodation should be addressed to the local management of the hotel establishment for immediate rectification. In any event, if a problem persists, you should complain in writing to the office, with a particular letter, within 7 days of your return to Cyprus. The application must always be accompanied by the relevant documents / certificates. Late applications or applications not accompanied by the appropriate supporting documents / certificates will not be taken into account.</p></dd> 
      <dt>TRAVEL DOCUMENTS ( passports, visas, health requirements, etc.): </dt>
   <dd><p>Each country has its own entry and exit requirements. It is your responsibility to make sure that You and the members of your party have and carry with them all valid travel documents, as necessary.</p></dd> 
      <dt>INSURANCE:</dt>
   <dd><p>
Adequate insurance cover may exist from insurance companies according to each insurance program`s contract (i.e., medical expenses, personal injuries, theft, etc.) Through our Other Services module You may book and purchase on line one of our insurance programs. We strongly recommend that You and all members of your party are adequately insured as soon as You make a flight booking.</p></dd> 
      <dt>PAYMENTS:</dt>
   <dd><p>
We shall not accept your booking unless full payment is made by debit credit card. Cash and cheque options are possible to individuals and/or Travel Agents when affecting a booking and payment in person at our offices. Such  cheque payments are subject to clearance through our Bank. Payments by special agreement are reserved for pre authorized accounts and/or Travel Agents. Following payment we shall process your booking and advise You accordingly. In case of non-availability we shall recommend alternative options and if not accepted by You we will refund the amount paid by You immediately.</p></dd> 
      <dt>GROUPS:</dt>
   <dd><p>
For a group of 10 or more persons please send your request through our site or call us.</p></dd>
   <dt>CANCELLATIONS AND/OR AMENDMENTS:</dt>
   <dd><p>
If after a confirmation has been given You wish to amend your accommodation arrangements You must submit a written request to us. We shall do our utmost to effect the change(s) but this is dependent on restrictions set forth by the accommodation establishments, and may attract a penalty or cancellation fee or the revised accommodation arrangements may cause an increase in costs. Any changes or modifications for dates of stay falling within a Fair Exhibition period are considered to be cancellations and are subject to the following cancellation charges:
·All cancellations will incur the cancellation charge of one night`s stay.
· All cancellations made more than 45 days prior to the check-in date will incur the cancellation charge of 25% of the total accommodation cost. All cancellations made between 44 and 21 days prior to the check-in date will incur the cancellation charge of 50% of the total accommodation cost. All cancellations made between 20 and 15 days prior to the check-in date will incur the cancellation charge of 75% of the total accommodation cost. All cancellations made within 14 days of the check-in date will incur a cancellation charge of 100% of the total accommodation cost and are totally non-refundable. For NON REFUNDABLE bookings always apply 100% cancellation fee.</p></dd> 
   <dt>CHANGES BY US</dt>
   <dd><p>There may be occasional and valid reasons, in most cases beyond our control, when changes have to be made and we reserve the explicit right to do so. In such cases or in the event of a confirmed booking becoming unavailable, for reasons beyond our control, we will do our utmost to notify You as soon this information is received by the supplier. We shall also endeavor to offer alternative accommodation of similar or higher standard at the same location. A full refund will be made immediately to your account if such alternative accommodation is not accepted by You.</p></dd>
   <dt>FORCE MAJEURE:</dt>
   <dd><p>
We will not be liable for any changes caused by natural disasters, threats of war, weather conditions, industrial or labor disputes or any similar event(s) beyond our control.</p></dd>
   <dt>DISCOUNTS:</dt>
   <dd><p>
Discounts for children (2 to less than 12 years of age, unless otherwise indicated) or for a third adult (when available) only apply when sharing the same room with two full paying adults, unless otherwise indicated.</p></dd>
   <dt>BOOKINGS:</dt>
   <dd><p>
We accept all bookings made at least 72 hours (or more) prior to the check-in date.</p></dd>
   <dt>CONFIRMATION AND ACCOMMODATION VOUCHERS:</dt>
   <dd><p>
When You book and pay for a hotel accommodation through this site You will receive an immediate Payment Record Number. We shall then verify payment. For immediate availability rooms we shall issue the Accommodation Vouchers within 24 to 72 hours and send them to You at the e-mail address provided to us. For on-request availability rooms we shall request confirmation from the supplier, which will normally be received within 24 hours. Upon receipt of supplier confirmation we shall issue the Accommodation Vouchers within 24 to 72 hours and send them to You at the e-mail address provided to us. In case of non-availability we shall endeavor to offer alternative hotel accommodation of similar standard at the same location and follow the same procedure. If such alternative accommodation is not accepted by You we shall immediately refund the amount paid to your account. You must print the Accommodation Voucher(s) communicated to the e-mail address provided to us (color printer is preferable but black-and-white vouchers are also acceptable) and present same to the hotel/apartment. In case of trouble when printing the Accommodation Voucher(s) please contact us immediately for corrective action .</p></dd>
   <dt><strong> D) PACKAGES AND ORGANISE TOURS</strong></dt>


   <dd><p><dd><p>
<dt>PRICES:</dt>
   
All prices:<br>
-Are inclusive of applicable taxes unless otherwise stated.<br>
-Are in Euro (EUR) unless otherwise provided.<br>
- Are quoted (unless otherwise provided) to cover air transportation, if applicable (unless otherwise provided), hotel accommodation, specified meals, tour guide & sightseeing tours (if applicable) and land
transfers( if applicable), for each variation selected on a per person basis, as specified in each Tour Operators Brochure (provided by the system).<br>
- Are accurate at the time of booking. If taxes, fees or charges are introduced or increased the cost of the excursion may be increased to cover this. Once the full price has been paid and the Excursion Vouchers have been issued we will not increase the price to be paid by You unless the Tour Operator who organizes and supplies the excursion also increases the price of the said excursion. In this case we reserve the right to pass the additional cost onto You.</p></dd> 
  

  <dt>DEPARTURE AND ARRIVAL DATES:</dt>
   <dd><p>
On the Excursion Brochure (provided by the system) of each Tour Operator the departure and arrival times are specified in detail. You and all members of your party have to follow the specified schedule/program of the excursion booked. Failure to do so does not give you the right to claim for unused services.</p></dd>

    <dt>EXCURSION BROCHURES:</dt>
   <dd><p>
Every effort has been made to provide accurate information, including photographs of all excursion services featured on our site or supplied through our site. In certain cases information and photographs provided by the Tour Operators may differ from actual. All such information is provided by the Tour Operators. We Endeavour to feature excursion services of commonly acceptable standards but we are not liable for any misrepresentation in the accuracy of information, descriptions or photographs supplied by third parties. In certain cases circumstances may necessitate changes or deviations from the excursion program. All schedules, itinerary destinations, hours of arrival and departure, hotel and/or land transfers, sightseeing tours and other components of the excursion program are subject to change without prior notice and without reference to us by the Tour Operators. If such eventuality materially affects Your enjoyment, it is in both our interests for  You to advise the management of the Tour Operator immediately, get a written report from the management and if corrective action is not taken or your complaint is notdealt with during Your excursion, contact us upon your return for a complaint follow up.</p></dd>
    <dt>CLAIMS:</dt>
   <dd><p>All claims involving the excursion should be addressed to the Tour Operator for immediate rectification. In any event, if a problem persists, you should complain in writing to the office, with a particular letter, within 7 days of your return to Cyprus. The application must always be accompanied by the relevant documents / certificates. Late applications or applications not accompanied by the appropriate supporting documents / certificates will not be taken into account.</p></dd>




<dt>TRAVEL DOCUMENTS ( passports, visas, health requirements, etc.):</dt><dd><p> Each country has its own entry and exit requirements. It is your responsibility to make sure that You and the members of your party have and carry with them all valid travel documents, as necessary.</p></dd>
<dt>INSURANCE:</dt><dd><p>
Adequate insurance cover may exist from insurance companies according to each insurance program`s contract (i.e., medical expenses, personal injuries, theft, etc.) Through our Other Services module You may book and purchase on line one of our insurance programs. We strongly recommend that You and all members of your party are adequately insured as soon as You make a flight booking.</p></dd>
<dt>PAYMENTS:</dt><dd><p>
We shall not accept your booking unless full payment is made by debit or credit card. Cash and cheque options are possible to individuals and/or Travel Agents when effecting a booking and payment in person at our offices. Such cheque payments are subject to clearance through our Bank. Payments by special agreement are reserved for pre -authorized accounts and/or Travel Agents. Following payment we shall process your booking and advise You accordingly. In case of non-availability we shall recommend alternative options and if not accepted by You we will refund the amount paid by You immediately. GROUPS:
For a group of 10 or more persons please send your request thru our site or call us.</p></dd>



    <dt>CANCELLATIONS AND/OR AMENDMENTS:</dt>
   <dd><p>If after a confirmation has been given You wish to amend Your excursion arrangements You must submit a written request to us. We shall do our utmost to effect the change(s) but this is dependent on restrictions set forth by the Tour Operator involved, and may attract a penalty or cancellation fee or the revised excursion arrangements may cause an increase in costs. Any changes or modifications requested less than 45 days prior to departure or for dates of stay falling within a Fair Exhibition period are considered to be cancellations and are subject to the following cancellation charges:
·All cancellations up to 45 days before departure will incur the cancellation charge of EUR50.00 per person.
·All cancellations made within the period of 44 to 30 days prior to departure will incur a cancellation charge of 30% of the total excursion cost.<br>
-All cancellations made within the period of 29 to 21 days prior to departure will incur a cancellation charge of 50% of the total excursion cost.<br>
-All cancellations made within 20 days prior to departure are fully non-refundable and will incur a cancellation charge of 100% of the total excursion cost <br>
 If one of the two people staying in a double room cancel their participation and as long as the cancellation fee shall not equal to 100% of the total value of the trip, then the traveler is required to pay out of the resulting charges and the difference of the room, as it will necessarily stay in a single room.. For charter programs, cruises, ski, exhibitions, conferences and similar international events, a 100% cancellation fees should be apply, regardless of the date of notification of cancellation as indicated in the Special Conditions of Participation on every program. If the amount owed has not been paid in its entirety, then it follows that the unpaid part of the amount is paid directly by the client
</p></dd>



    <dt>CHANGES BY US:</dt>
   <dd><p>
There may be occasional and valid reasons, in most cases beyond our control, when changes have to be made and we reserve the explicit right to do so. In such cases or In the event of a confirmed booking becoming unavailable, for reasons beyond our control, we will do our utmost to notify You as soon this information is received by the Tour Operator. We shall also endeavor to offer alternative excursion of similar duration and to the same or similar destination. A full refund will be made immediately to your account if such alternative excursion is not accepted by You. We accept no liability if after the date of a trip, a scheduled airline flight is not carried out, or other events that are beyond our control and in spite of our diligence and care we can’t  afford to avoid, such as a change of aircraft another smaller capacity, or delays caused by technical failure, or in cases of force majeure, such as war, from terrorism, from social unrest, natural disasters, strikes various industries, natural disasters, epidemics, embargo. Transportation issues with ships, planes and trains and to ensure accommodation, our liability in all cases is limited to the context of the International Conditions of Carriage. Decisions to delay or route changes may be decided by various governmental and other organizations with consequent delay, change schedules, flights. The office can’t  control or foresee such actions and therefore can’t  assume responsibility for these cases.
</p></dd>
    <dt>FORCE MAJEURE:</dt>
   <dd><p>
We will not be liable for any changes caused by natural disasters, threats of war, weather conditions, industrial or labor disputes or any similar event(s) beyond our control.
</p></dd>
    <dt>BOOKINGS:</dt>
   <dd><p>
We accept all bookings made at least 72 hours (or more) prior to the departure date.
</p></dd>
    <dt>CONFIRMATION AND EXCURSION VOUCHERS:</dt>
   <dd><p>
When You book and pay for an excursion through this site You will receive an immediate Payment Record Number. We shall then verify payment. For immediate availability excursions we shall issue the Excursion Vouchers within 24 to 72 hours and send them to You at the e-mail address provided to us. For on-request availability excursions we shall request confirmation from the Tour Operator, which will normally be received within 24 hours. Upon receipt of Tour Operator confirmation we shall issue the Excursion Vouchers within 24 to 72 hours and send them to You at the e-mail address provided to us. In case of non-availability we shall endeavor to offer an alternative excursion of similar duration and to the same or similar destination. If such alternative excursion is not accepted by You we shall immediately refund the amount paid to your account. You must print the Excursion Voucher(s) delivered to the e-mail address provided to us (color printer is preferable but black-and-white vouchers are also acceptable) and present same to the Tour Operator Guide at the airport of departure (if applicable) or to the Tour Operator Guide at the point of departure. In case of trouble when printing the Excursion Voucher(s) please contact us immediately for corrective action.</p></dd>








    <dt>E) CRUISES  </dt>
   <dd><p>The transportation of guest(s) and baggage is subject to the terms and conditions of the individual cruise lines, which are incorporated herein by reference and made part of the cruise contract. Incorporated terms may include, but are not limited to:<br>
o Liability limitations for personal injury or death.<br>
o Baggage liability limitations.<br>
o The right of the Cruise Lines to change the terms of the contract.<br>
o The right of the Cruise Lines to change schedules without notice.<br>
o Right of refusal of passage.<br>
Individual terms and conditions of the Cruise Lines promoted through our site can be provided upon your written request. You have also the right to inspect the full text of each Cruise Line`s applicable terms at its seaport and city offices.</p></dd>









    <dt>PRICES:</dt>
   <dd><p>
All prices:<br>
o Are inclusive of applicable taxes unless otherwise stated.<br>
o Are in Euro (EUR) unless otherwise indicated.<br>
o Are accurate at the time of booking.<br>
If taxes, fees or charges are introduced or increased the cost of the cruise may be increased to cover this. Once the full price has been paid and the Cruise Voucher(s) have been issued we will not increase the price to be paid by You unless the Cruise Line also increases the price of the said cruise. In this case we reserve the right to pass the additional cost onto You. ADVANCED OR DELAYED SAILINGS AND CHANGES IN
</p></dd>
    <dt>ITINERARY:</dt>
   <dd><p>
On the Cruise Brochure (provided by the system) of each Cruise Line the departure and arrival times are specified in detail. You and all members of your party have to follow the specified schedule of the cruise booked and failure on your part to adhere does not give you the right to claim for unused service(s). In the event of strikes, lockouts, riots, adverse weather conditions or mechanical difficulties, or for any other reason whatsoever, Cruise Lines may at any time and without prior notice, cancel, advance, postpone or deviate from any scheduled sailing or port of call and may, but is not obliged to, substitute another ship or port of call, and said Line is not to be liable for any loss whatsoever to guests by reason of such cancellation, advancement, postponement, deviation or substitution.
</p></dd>
    <dt>CRUISE BROCHURES:</dt>
   <dd><p>
Every effort has been made to provide accurate information, including photographs of all cruise services featured on our site or supplied through our site. In certain cases information and photographs provided by the Cruise Lines may differ from actual. All such information is provided by the Cruise Lines. We Endeavour to feature cruise services of commonly acceptable standards but we are not liable for any misrepresentation in the accuracy of information, descriptions or photographs supplied by third parties. In certain cases circumstances may necessitate changes or deviations from the cruise program. All schedules, itinerary destinations, hours of arrival and departure, cabin and/or hotel accommodation and/or land transfers, sightseeing tours and other components of the cruise program are subject to change without prior notice and without reference to us by the Cruise Lines.
</p></dd>
    <dt>CLAIMS:</dt>
   <dd><p>
All claims involving the cruise should be addressed to the Cruise Line and not to us.
TRAVEL DOCUMENTS( passports, visas, health requirements, etc.): Each country has its own entry and exit requirements. It is your responsibility to make sure that You and the members of your party have and carry with them all valid travel documents, as necessary. In any event, if a problem persists, you should complain in writing to the office, with a particular letter, within 7 days of your return to Cyprus. The application must always be accompanied by the relevant documents / certificates. Late applications or applications not accompanied by the appropriate supporting documents / certificates will not be taken into account.
</p></dd>
    <dt>MEDICAL SERVICES:</dt>
   <dd><p>
Professional medical services are normally available on board at a reasonable fee. You must ensure that You and all members of your party are medically and physically fit for travel. Pregnant women may not be accepted aboard the ship when in the third trimester of their pregnancy. In all cases, please contact the Cruise Line direct for further information or contact us for the individual terms and conditions of the Cruise Line concerned.
</p></dd>
    <dt>UNACCOMPANIED MINORS:</dt>
   <dd><p>
Cruise Lines have individual terms and conditions regarding age limitations for unaccompanied minors. Please contact the Cruise Line direct for specific information or contact us for the individual terms and conditions of the Cruise Line concerned. DANGEROUS ARTICLES:
Dangerous articles such as firearms, explosives, cylinders containing compressed air or combustion substances, etc. are normally not allowed aboard the ship. For further information please contact the Cruise Line direct or contact us for the individual terms and conditions of the Cruise Line concerned.
</p></dd>
    <dt>BAGGAGE AND LOSS OF PROPERTY:</dt>
   <dd><p>
Each Cruise Line has its own terms and conditions regarding lost or damaged baggage and/or loss of property especially regarding reporting procedures and time limitations of said reporting procedures. For further information please contact the Cruise Line direct or contact us for the individual terms and
conditions of the Cruise Line concerned.
</p></dd>
    <dt>REFUSAL OF PASSAGE:</dt>
   <dd><p>
Depending on each Cruise Liner`s individual terms and conditions, the captain of a ship may refuse boarding to anyone who poses a threat to the safety of the voyage or to anyone whose behavior is abusive and/or disruptive to the smooth operation of the cruise.
</p></dd>
    <dt>INSURANCE:</dt>
   <dd><p>
Adequate insurance cover may exist from insurance companies according to each insurance program`s contract (i.e., medical expenses, personal injuries, theft, etc.) Through our Other Services module You may book and purchase on line one of our insurance programs. We strongly recommend that You and all members of your party are adequately insured as soon as You make a flight booking.
</p></dd>
    <dt>PAYMENTS:</dt>
   <dd><p>
We shall not accept your booking unless full payment is made by debit or credit card. Cash and cheque options are possible to individuals and/or Travel Agents when effecting a booking and payment in person at our offices. Such cheque payments are subject to clearance through our Bank. Payments by special agreement are reserved for pre authorized accounts and/or Travel Agents.Following payment we shall process your booking and advise You accordingly. In case of non-availability we shall recommend alternative options and if not accepted by You we will refund the amount paid by You immediately.
</p></dd>
    <dt>GROUPS:</dt>
   <dd><p>
For a group of 10 or more persons please send your request through our site or call us.
</p></dd>
    <dt>CANCELLATIONS AND/OR AMENDMENTS:</dt>
   <dd><p>
If after a confirmation has been given You wish to amend your cruise arrangements You must submit a written request to us. We shall do our utmost to effect the changes but this is dependent on restrictions set forth by the Cruise Line concerned, and may attract a penalty or cancellation fee or the revised cruise arrangements may cause an increase in costs. Any changes or modifications requested less than 340 days prior to sailing are considered to be cancellations and are subject to the following cancellation charges:<br>
Charged (can vary from company to company)<br>
·All cancellations upto 340 days before will incur the cancellation charge of EUR 100.00 per person.<br>
·All cancellations made within the period of 339 to 120 days prior to sailing will incur a cancellation charge of 700€ per cabin<br>
· All cancellations made within the period of 119 to 90 days :  25% of the total value of the package or € 700 cabin (what is the greatest )  <br>
 All cancellations made within the period of 89 days or less prior to sailing will incur a 100% cancellation of the total cost of the package.    <br>
 You can change your reservation depending on availability until 90 days before departure by paying a change fee (rebooking fee) of € 50 per person. In case of changes within 90 days prior to departure will apply the cancellation fees listed above and should be re-booked. Any change in the date, destination / cruise embarkation port, hotel, cabin type and mode of transport is considered a change in the reservation.
</p></dd>
    <dt>CHANGES BY US:</dt>
   <dd><p>
There may be occasional and valid reasons, in most cases beyond our control, when changes have to be made and we reserve the explicit right to do so. In such cases or In the event of a confirmed booking becoming unavailable, for reasons beyond our control, we will do our utmost to notify You as soon this information is received by the Cruise Line. We shall also endeavor to offer an alternative cruise of similar duration and to the same or similar destination. A full refund will be made immediately to your account if such alternative cruise is not accepted by You.
</p></dd>
    <dt>FORCE MAJEURE:</dt>
   <dd><p>
We will not be liable for any changes caused by natural disasters, threats of war, weather conditions, industrial or labor disputes or any similar event(s) beyond our control.
</p></dd>
    <dt>BOOKINGS:</dt><p>
We accept all bookings made at least 72 hours (or more) prior to the sailing date.
</p></dd>
    <dt>CONFIRMATION AND CRUISE VOUCHERS:</dt>
   <dd><p>
When You book and pay for a cruise through this site You will receive an immediate Payment Record Number. We shall then verify payment. For immediate availability cruises we shall issue the Cruise Voucher(s) within 24 to 72 hours and send them to You at the e-mail address provided to us. For on-request availability of cruises we shall request confirmation from the Cruise Line, which will normally be received within 24 hours. Upon receipt of Cruise Line confirmation we shall issue the Cruise Voucher(s) within 24 to 72 hours and send them to You at the e-mail address provided to us. In case of non-availability we shall endeavor to offer an alternative cruise of similar duration and to the same or similar destination. If such alternative cruise is not accepted by You we shall immediately refund the amount paid to your account. You must print the Cruise Voucher(s) delivered to the e-mail address provided to us (color printer is preferable but black- and- white vouchers are also acceptable) and present same to the Cruise Line at the seaport of departure. In case of trouble when printing the Cruise Voucher(s) please contact us immediately for corrective action.</p></dd>




 <dt>F) RENT-A-CAR</dt>
   <dd><p></p></dd>





<dt>PRICES:</dt>
   <dd><p>
All prices:<br>
-Are inclusive of all applicable taxes unless otherwise stated.<br>
-Are in Euro (EUR) unless otherwise provided. <br> 
-Are quoted (unless otherwise provided) to cover car rental, insurance as specified and local service charges.<br>
- Are accurate at the time of booking. Any applicable supplements (e.g. personal accident insurance, additional drivers, roof racks, child seats etc) will be calculated on a per person per day basis or on a per unit per day basis, whichever applicable, will be shown separately and added to the basic quotation.If taxes, fees or charges are introduced or increased the cost of the car rental may be increased to cover this. Once the full price has been paid and the Car Rental Vouchers have been issued we will not increase the price to be paid by You unless the Supplier of the car rental also increases the price of the said car rental. In this case we reserve the right to pass the additional cost onto You.
</p></dd><dt>PICK-UP AND DROP-OFF:</dt>
   <dd><p>
Car rental prices reflect a 24-hour hire of the chosen car. Pick-up and drop-off times vary from country to country but normal pick-up and drop-off times from a city location are limited to within the regular opening and closing hours of business of the location. Pick-up and drop-off outside the normal hours of business of a specific location will incur a surcharge. Pick-up and drop- off at any time of day or night is possible at extra charge payable locally when collecting your chosen car from an airport location. If in doubt we recommend that You check with the specific car rental supplier at time of booking.
</p></dd><dt>CAR / MODEL CLASSIFICATIONS:</dt>
   <dd><p>
Car group ratings and/or car class classifications may vary from country to country and, therefore, cannot be relied upon to identify the size or capacity of the selected car. Details of the selected cart, including photos (if applicable), are provided by the system for your check prior to booking and payment.
</p></dd><dt>CAR BROCHURES:</dt>
   <dd><p>
Every effort has been made to provide accurate information, including photographs of all cars and models featured on or supplied through our site. In certain cases information and photographs provided by car rental suppliers may differ from actual. All such information is provided by the Suppliers. We Endeavour to feature car rental services of commonly acceptable standards reflecting their class category classification but we are not liable for any misrepresentation in the accuracy of information, descriptions or photographs supplied by third parties. In certain cases cars supplied by car rental operators through our web site may not be to your full expectations or may not be in the standard of cleanliness or operational state anticipated by You or may without negligence on your part, break down. In such an eventuality, it is in both our interests for You to advise the local management of the car rental suppliers immediately, get a written report from the management and if corrective action is not taken or your complaint is not dealt with during your rental, contact us upon your return for the initialization of a complaint procedure and follow up. It is understood that a car indicated to seat three or more adults does not necessarily mean it can take their baggage. We do not accept liability irresponsibility should You then consider the car boot to be of limited space. We recommend that You consider a bigger car at the time of booking rather than at the time of pick-up.
</p></dd><dt>CLAIMS:</dt>
   <dd><p>
All claims involving car rental services should be addressed to the local management of the car rental supplier for immediate rectification. In any event, if a problem persists, you should complain in writing to the office, with a particular letter, within 7 days of your return to Cyprus. The application must always be accompanied by the relevant documents / certificates. Late applications or applications not accompanied by the appropriate supporting documents / certificates will not be taken into account.
</p></dd><dt>DRIVING LICENCE DOCUMENTATION :</dt>
   <dd><p>
Each country has its own driving license and identification requirements. It is your responsibility to make sure that You and the members of your party (if applicable) have and carry with them all valid driving documents, as necessary.
</p></dd><dt>INSURANCE:</dt>
   <dd><p>
Adequate insurance cover may exist from insurance companies according to each insurance program`s contract (i.e., medical expenses, personal injuries, theft, etc.) Through our Other Services module You may book and purchase on line one of our insurance programs. We strongly recommend that You and all members of your party are adequately insured as soon as You make a flight booking.
</p></dd><dt>PAYMENTS:</dt>
   <dd><p>
We shall not accept your booking unless full payment is made by debit or credit card. Cash and cheque options are possible to individuals and/or Travel Agents when effecting a booking and payment in person at our offices. Such cheque payments are subject to clearance through our Bank. Payments by special agreement are reserved for pre authorized accounts and/or Travel Agents. .Following payment we shall process your booking and advise You accordingly. In case of non-availability we shall recommend alternative options and if not accepted by You we will refund the amount paid by You immediately.
</p></dd><dt>SPECIAL CAR GROUPS:</dt>
   <dd><p>
For special car groups please send your request through our site or call us.
</p></dd><dt>CANCELLATIONS AND/OR AMENDMENTS:</dt>
   <dd><p>
If after a confirmation has been given You wish to amend your car rental arrangements You must submit a written request to us. We shall do our utmost to effect the change(s) but this is dependent on restrictions set forth by the car rental suppliers and may attract a penalty or cancellation fee or the revised arrangements may cause an increase in costs. Any changes or modifications for days of rental coinciding within a Fair Exhibition period are considered to be cancellations and are subject to the following cancellation charges:<br>
·All cancellations will incur the cancellation charge of one day`s rental cost.<br>
· All cancellations made more than 45 days prior to the pick-update will incur the cancellation charge of 25% of the total car rental cost.<br>
·All cancellations made between 44 and 21 days prior to the pick-up date will incur the cancellation charge of 50% of the total car rental cost. ·<br>
-All cancellations made between 20 and 15 days prior to the pick-up date will incur the cancellation charge of 75% of the total car rental cost. ·<br>
-All cancellations made within 14 days of the pick-up date are non refundable and will incur a cancellation charge of100% of the total car rental cost.<br>
</p></dd><dt>CHANGES BY US:</dt>
   <dd><p>
There may be occasional and valid reasons, in most cases beyond our control, when changes have to be made and we reserve the explicit right to do so. In such cases or in the event of a confirmed booking becoming unavailable, for reasons beyond our control, we will do our utmost to notify You as soon this information is received by the car rental supplier. We shall also endeavour to offer alternative car rental service of similar or higher standard at the same location. A full refund will be made immediately to your account if such alternative service is not accepted by You.
</p></dd><dt>FORCE MAJEURE:</dt>
   <dd><p>
We will not be liable for any changes caused by natural disasters, threats of war, weather conditions, industrial or labor disputes or any similar event(s) beyond our control.
</p></dd><dt>DISCOUNTS:</dt>
   <dd><p>
Discounts for long term rentals are available for rentals of more than 14 days or monthly rentals. Sometimes discounts are also available for advance booking rentals. We recommend that you query at the time of booking.
</p></dd><dt>BOOKINGS:</dt>
   <dd><p>
We accept all bookings made at least 72 hours (or more) prior to the pick-up date.
</p></dd><dt>CONFIRMATION AND CAR RENTAL VOUCHERS:</dt>
   <dd><p>
When You book and pay for a car rental through this site You will receive an immediate Payment Record Number. We shall then verify payment. For immediate availability car rentals we shall issue the Car Rental Vouchers within 24 to 72 hours and send them to You at the e-mail address provided to us. For on-request availability car rentals we shall request confirmation from the supplier, which will normally be received within 24 hours. Upon receipt of supplier confirmation we shall issue the Car Rental Vouchers within 24 to 72 hours and send them to You at the e-mail address provided to us. In case of non- availability we shall endeavour to offer alternative car rental service of similar standard at the same location and follow the same procedure. If such alternative service is not accepted by You we shall immediately refund the amount paid to your account. You must print the Car Rental Voucher(s) communicated to the e-mail address provided by you to us (color printer is preferable but black and white vouchers are also acceptable) and present same to the car rental supplier at the pick-up location. In case of trouble when printing the Voucher(s) please contact us immediately for corrective action.</p></dd>



<dt>G) TRANSFERS</dt>
   <dd><p></p></dd>


    <dt>PRICES:</dt>
   <dd><p>
All prices:<br>     
    -Are in Euro (EUR) unless otherwise provided.
</p></dd>
    <dt>PICK-UP AND DROP-OFF:</dt>
   <dd><p>
Transfer  prices reflect a 24-hour hire of the chosen arrival date. Pick-up and drop-off outside the normal hours of business of a specific location will incur a surcharge.
</p></dd>
    <dt>CLAIMS: </dt>
   <dd><p>          All claims involving transfer services should be addressed to the local management of the transfer supplier for immediate rectification. In any event, if a problem persists, you should complain in writing to the office, with a particular letter, within 7 days of your return to Cyprus. The application must always be accompanied by the relevant documents / certificates. Late applications or applications not accompanied by the appropriate supporting documents / certificates will not be taken into account.
</p></dd>
    <dt>PRICES: All prices:</dt>
   <dd><p>
o Are inclusive of applicable taxes unless otherwise stated.<br>
o Are in Euro (EUR) unless otherwise provided.<br>
o Are accurate at the time of booking.<br>
</p></dd>
    <dt>PAYMENTS:</dt>
   <dd><p>
We shall not accept your booking unless full payment is made by debit or credit card. Cash and cheque options are possible to individuals and/or Travel Agents when effecting a booking and payment in person at our offices. Such cheque payments are subject to clearance through our Bank. Payments by special agreement are reserved for pre authorized accounts and/or Travel Agents.
</p></dd>
    <dt>CANCELLATIONS AND/OR AMENDMENTS:</dt>
   <dd><p>
If after a confirmation has been given You wish to amend Your other service arrangements You must submit a written request to us. We shall do our utmost to effect the change(s) but this is dependent on restrictions set forth by the Provider involved, and may attract a penalty or cancellation fee or the revised other service arrangements may cause an increase in costs.
</p></dd>
    <dt>CHANGES BY US:</dt>
   <dd><p>
There may be occasional and valid reasons, in most cases beyond our control, when changes have to be made and we reserve the explicit right to do so. In such cases or In the event of a confirmed booking becoming unavailable, for reasons beyond our control, we will do our utmost to notify You as soon this information is received by the Provider.
</p></dd>
    <dt>FORCE MAJEURE:</dt>
   <dd><p>
We will not be liable for any changes caused by natural disasters, threats of war, weather conditions, industrial or labor disputes or any similar event(s) beyond our control.
</p></dd>
    <dt>BOOKINGS:</dt>
   <dd><p>
We accept all bookings made at least 24 hours (or more) prior to the departure date, if applicable.
Applicable law and jurisdiction:
This Agreement shall be governed and construed and interpreted in accordance with the Laws in the Norther Cyprus and both parties submit to the jurisdiction of the courts of the Republic of Cyprus.</p></dd>
    














   
    
    <dt></dt>
   <dd><p></p></dd>
    <dt></dt>
   <dd><p></p></dd>
    <dt></dt>
   <dd><p></p></dd>
    <dt></dt>
   <dd><p></p></dd>


  </dl>

                </p>
                <p>
<strong>
                BY ACCESSING THIS WEB SITE OR USING ANY SERVICE PROVIDED HEREIN YOU AFFIRM THAT YOU HAVE READ THIS ENTIRE AGREEMENT AND AGREE TO ALL ITS TERMS AND CONDITIONS. IF YOU DO NOT AGREE TO ALL OF THE TERMS AND CONDITIONS SET HEREIN ABOVE IN THIS AGREEMENT, PLEASE EXIT THIS SITE.
</strong>

                </p>
            </div>


        </div>













































    </div>

    <!--==============================footer=================================-->

    <?php include ('includes/php/footer.php'); ?>
    <script src="includes/js/lightgallery.js"></script>
    <script src="includes/js/lg-fullscreen.js"></script>
    <script src="includes/js/lg-thumbnail.js"></script>
    <script src="includes/js/lg-video.js"></script>
    <script src="includes/js/lg-autoplay.js"></script>
    <script src="includes/js/lg-zoom.js"></script>
    <script src="includes/js/lg-hash.js"></script>
    <script src="includes/js/lg-pager.js"></script>
    <script src="includes/js/hotels.min.js"></script>
    <script src="includes/js/slider__page.js"></script>





</body>

</html>

<?php

// always get 'user_search' or null 
//value == ['code_search','result']
function session_get()
{
      $session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
    //$session->destroy();
   $segment = $session->getSegment('Vendor\Package\ClassName');
      // var_dump( $segment->get('user_search'));
  return  $segment->get('user_search');
}
?>