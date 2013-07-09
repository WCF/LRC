<?php
    require_once('pop/pop.php');
    require_once('google-api-php-client/src/Google_Client.php');
    require_once('google-api-php-client/src/contrib/Google_CalendarService.php');
?>

<section id="linkList" class="buble">
    <ul>
        <li>
            <a href="/sermon.php">Sermon</a>
        </li>
        <li>
            <a href="/newsletter.php">Newsletter</a>
        </li>
        <li>
            <a href="/programs-prayer.php">Prayers</a>
        </li>
        <li>
            <a href="/welcome.php">First time here?</a>
        </li>
    </ul>
</section>

<div class="campfire">
    <img id="campfireImg" alt=""/>
</div>

<div id="eventList">
    <div class="title">
        <h2> Calendar of Events </h2>
    </div>
    <?php
        session_start();  // inline php: you might get "session already started" warning on dev/prod

        $client = new Google_Client();
        $client->setApplicationName('LRC Test Website');
        $client->setDeveloperKey('AIzaSyC2t1b_JMWoVT2WtNoLvofRLsKaB1COSnA');

        $cal = new Google_CalendarService($client);
        $events = $cal->events->listEvents('m6gor60jv1r7hm75mr7avpsjag@group.calendar.google.com');

        $monthNames = array (
            0 => '',
            1 => 'JAN',
            2 => 'FEB',
            3 => 'MAR',
            4 => 'APR',
            5 => 'MAY',
            6 => 'JUN',
            7 => 'JUL',
            8 => 'AUG',
            9 => 'SEP',
            10 => 'OCT',
            11 => 'NOV',
            12 => 'DEC'
        );

        foreach ($events['items'] as $event) {
            if ($event['transparency']) {
                continue;
            }
            list($year, $monthNum, $day) = explode('-', $event['start']['date']);
            $month = $monthNames[intval($monthNum)];
            $title = $event['summary'];
            $description = $event['description'];
        ?>
        <div class="event">
            <div class="date">
                <span class="big"><?php echo $day; ?></span>
                <span class="small"><?php echo $month; ?></span>
            </div>
            <div class="content">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="description">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
        <?php
        }
    ?>
</div>

</div>
