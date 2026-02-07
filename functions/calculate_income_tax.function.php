<?php

/* Federal Income Tax Withheald: substract 61.54 from the current earnings for each withholding exemption 
   and use Table 3 or Table 4, depending on marital status

    Table 3: Federal income tax withheld for a single person paid weekly.
    +------------------------+-------------------------------------+
    | Adjusted Weekly Income | Income Tax Withheld                 |
    +------------------------+-------------------------------------+
    | 0 to 51                | 0                                   |
    | Over 51 to 188         | 10% of amout over 51                |
    | Over 188 to 606        | 13.70 + 15% of amount over 188      |
    | Over 606 to 1,341      | 76.40 + 25% of amount over 606      |
    | Over 1,341 to 2,922    | 260.15 + 28% of amount over 1,341   |
    | Over 2,922 to 6,313    | 702.83 + 33% of amount over 2,922   |
    | Over 6,313             | 1,821.86 + 35% of amount over 6,313 |
    +------------------------+-------------------------------------+


    Table 4: Fedral income tax withheld for a married person paid weekly.
    +------------------------+-------------------------------------+
    | Adjusted Weekly Income | Income Tax Withheld                 |
    +------------------------+-------------------------------------+
    | 0 to 154               | 0                                   |
    | Over 154 to 435        | 10% of amout over 154               |
    | Over 435 to 1,273      | 28.10 + 15% of amount over 435      |
    | Over 1,273 to 2,322    | 153.80 + 25% of amount over 1,273   |
    | Over 2,322 to 3,646    | 416.05 + 28% of amount over 2,322   |
    | Over 3,646 to 6,409    | 786.77 + 33% of amount over 3,646   |
    | Over 6,409             | 1,698.56 + 35% of amount over 6,409 |
    +------------------------+-------------------------------------+

*/

function calculateIncomeTax($adjusted, $status)
{
    if ($status === "s") {
        if ($adjusted <= 51) return 0;
        if ($adjusted <= 188) return 0.10 * ($adjusted - 51);
        if ($adjusted <= 606) return 13.70 + 0.15 * ($adjusted - 188);
        if ($adjusted <= 1341) return 76.40 + 0.25 * ($adjusted - 606);
        if ($adjusted <= 2922) return 260.15 + 0.28 * ($adjusted - 1341);
        if ($adjusted <= 6313) return 702.83 + 0.33 * ($adjusted - 2922);
        return 1821.86 + 0.35 * ($adjusted - 6313);
    } else { // married
        if ($adjusted <= 154) return 0;
        if ($adjusted <= 435) return 0.10 * ($adjusted - 154);
        if ($adjusted <= 1273) return 28.10 + 0.15 * ($adjusted - 435);
        if ($adjusted <= 2322) return 153.80 + 0.25 * ($adjusted - 1273);
        if ($adjusted <= 3646) return 416.05 + 0.28 * ($adjusted - 2322);
        if ($adjusted <= 6409) return 786.77 + 0.33 * ($adjusted - 3646);
        return 1698.56 + 0.35 * ($adjusted - 6409);
    }
}
