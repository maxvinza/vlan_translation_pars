# vlan_translation_pars

Usage (examples see in test/test.php).

On input:
```
#
somethink commands
create vlan_translation ports 1 cvid 1908 replace svid 2138
create vlan_translation ports 1 cvid 2017 replace svid 282
create vlan_translation ports 1 cvid 218 replace svid 281
create vlan_translation ports 12,16 cvid 220 add svid 283
create vlan_translation ports 12,16 cvid 221 add svid 283
create vlan_translation ports 2-3 cvid 899 replace svid 899
create vlan_translation ports 1,5-6,12-14 cvid 800 add svid 810
create vlan_translation ports 1 cvid 1482 replace svid 2054
create vlan_translation ports 19 cvid 1489 replace svid 2251
```
On output:
```
[
    [
        "port" => 1,
        "cvid" => 1908,
        "action" => "replace",
        "svid" => 2138,
    ],
    [
        "port" => 1,
        "cvid" => 2017,
        "action" => "replace",
        "svid" => 282,
    ]
    ...
]
```
