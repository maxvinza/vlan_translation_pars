<?php
class Vlan_translation {
    var $translations = array();

    function __construct($config) {
        $lines = explode("\n", $config);
        foreach($lines as $line) {
            if (substr_count($line, "create vlan_translation ports") > 0) $this->pars_line($line);
        }
    }

    function pars_line($line) {
        $line = trim($line);
        $words = explode(" ", $line);

        $ports = array();
        $bloks = explode(",", $words[3]);

        foreach($bloks as $blok) {
            if(is_numeric($blok)) {
                $ports[] = $blok;
            } else {
                $interval = explode("-", $blok);
                if (count($interval) == 2  AND is_numeric($interval[0]) AND is_numeric($interval[1])) {
                    while ($interval[0] <= $interval[1]) {
                        $ports[] = $interval[0];
                        ++$interval[0];
                    }
                }
            }
        }

        $cvid = $words[5];
        $action = $words[6];
        $svid = $words[8];

        foreach($ports as $port) {
            $translation = [
                "port" => $port,
                "cvid" => $cvid,
                "action" => $action,
                "svid" => $svid,
            ];
            $this->translations[] = $translation;
        }
    }

    function get_seach($word, $seach) {
        $ret = array();

        foreach($this->translations as $translation) {
            if($translation[$word] == $seach) $ret[] = $translation;
        }

        return $ret;
    }

    function get_translation_by_port($port) {
        return $this->get_seach("port", $port);
    }

    function get_translation_by_svid($svid) {
        return $this->get_seach("svid", $svid);
    }

    function get_translation_by_сvid($cvid) {
        return $this->get_seach("cvid", $cvid);
    }

    function get_translation_by_action($action) {
        return $this->get_seach("action", $action);
    }
}
?>
