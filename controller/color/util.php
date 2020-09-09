<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
include_once("colors.inc.php");

function hexToRgb($hex_color) {
    $values = str_replace('#', '', $hex_color);
    switch (strlen($values)) {
        case 3;
            list( $r, $g, $b ) = sscanf($values, "%1s%1s%1s");
            return array(hexdec("$r$r"), hexdec("$g$g"), hexdec("$b$b"));
        case 6;
            return array_map('hexdec', sscanf($values, "%2s%2s%2s"));
        default:
            return false;
    }
}

function hexColorToMaterial($color, $invert = false) {
    $rgb = hexToRgb($color);
    $red = $invert ? abs($rgb[0] - 255) : $rgb[0];
    $green = $invert ? abs($rgb[1] - 255) : $rgb[1];
    $blue = $invert ? abs($rgb[2] - 255) : $rgb[2];

    $materialData = array("244 67 54", "255 235 238", "255 205 210", "239 154 154", "229 115 115", "239 83 80", "229 57 53", "211 47 47", "198 40 40", "183 28 28", "255 138 128", "255 82 82", "255 23 68", "213 0 0", "233 30 99", "252 228 236", "248 187 208", "244 143 177", "240 98 146", "236 64 122", "216 27 96", "194 24 91", "173 20 87", "136 14 79", "255 128 171", "255 64 129", "245 0 87", "197 17 98", "156 39 176", "243 229 245", "225 190 231", "206 147 216", "186 104 200", "171 71 188", "142 36 170", "123 31 162", "106 27 154", "74 20 140", "234 128 252", "224 64 251", "213 0 249", "170 0 255", "103 58 183", "237 231 246", "209 196 233", "179 157 219", "149 117 205", "126 87 194", "94 53 177", "81 45 168", "69 39 160", "49 27 146", "179 136 255", "124 77 255", "101 31 255", "98 0 234", "63 81 181", "232 234 246", "197 202 233", "159 168 218", "121 134 203", "92 107 192", "57 73 171", "48 63 159", "40 53 147", "26 35 126", "140 158 255", "83 109 254", "61 90 254", "48 79 254", "33 150 243", "227 242 253", "187 222 251", "144 202 249", "100 181 246", "66 165 245", "30 136 229", "25 118 210", "21 101 192", "13 71 161", "130 177 255", "68 138 255", "41 121 255", "41 98 255", "3 169 244", "225 245 254", "179 229 252", "129 212 250", "79 195 247", "41 182 246", "3 155 229", "2 136 209", "2 119 189", "1 87 155", "128 216 255", "64 196 255", "0 176 255", "0 145 234", "0 188 212", "224 247 250", "178 235 242", "128 222 234", "77 208 225", "38 198 218", "0 172 193", "0 151 167", "0 131 143", "0 96 100", "132 255 255", "24 255 255", "0 229 255", "0 184 212", "0 150 136", "224 242 241", "178 223 219", "128 203 196", "77 182 172", "38 166 154", "0 137 123", "0 121 107", "0 105 92", "0 77 64", "167 255 235", "100 255 218", "29 233 182", "0 191 165", "76 175 80", "232 245 233", "200 230 201", "165 214 167", "129 199 132", "102 187 106", "67 160 71", "56 142 60", "46 125 50", "27 94 32", "185 246 202", "105 240 174", "0 230 118", "0 200 83", "139 195 74", "241 248 233", "220 237 200", "197 225 165", "174 213 129", "156 204 101", "124 179 66", "104 159 56", "85 139 47", "51 105 30", "204 255 144", "178 255 89", "118 255 3", "100 221 23", "205 220 57", "249 251 231", "240 244 195", "230 238 156", "220 231 117", "212 225 87", "192 202 51", "175 180 43", "158 157 36", "130 119 23", "244 255 129", "238 255 65", "198 255 0", "174 234 0", "255 235 59", "255 253 231", "255 249 196", "255 245 157", "255 241 118", "255 238 88", "253 216 53", "251 192 45", "249 168 37", "245 127 23", "255 255 141", "255 255 0", "255 234 0", "255 214 0", "255 193 7", "255 248 225", "255 236 179", "255 224 130", "255 213 79", "255 202 40", "255 179 0", "255 160 0", "255 143 0", "255 111 0", "255 229 127", "255 215 64", "255 196 0", "255 171 0", "255 152 0", "255 243 224", "255 224 178", "255 204 128", "255 183 77", "255 167 38", "251 140 0", "245 124 0", "239 108 0", "230 81 0", "255 209 128", "255 171 64", "255 145 0", "255 109 0", "255 87 34", "251 233 231", "255 204 188", "255 171 145", "255 138 101", "255 112 67", "244 81 30", "230 74 25", "216 67 21", "191 54 12", "255 158 128", "255 110 64", "255 61 0", "221 44 0", "121 85 72", "239 235 233", "215 204 200", "188 170 164", "161 136 127", "141 110 99", "109 76 65", "93 64 55", "78 52 46", "62 39 35", "158 158 158", "250 250 250", "245 245 245", "238 238 238", "224 224 224", "189 189 189", "117 117 117", "97 97 97", "66 66 66", "33 33 33", "96 125 139", "236 239 241", "207 216 220", "176 190 197", "144 164 174", "120 144 156", "84 110 122", "69 90 100", "55 71 79", "38 50 56", "0 0 0", "255 255 255");
    //$materialDataNames = array("red-500", "red-50", "red-100", "red-200", "red-300", "red-400", "red-600", "red-700", "red-800", "red-900", "red-A100", "red-A200", "red-A400", "red-A700", "pink-500", "pink-50", "pink-100", "pink-200", "pink-300", "pink-400", "pink-600", "pink-700", "pink-800", "pink-900", "pink-A100", "pink-A200", "pink-A400", "pink-A700", "purple-500", "purple-50", "purple-100", "purple-200", "purple-300", "purple-400", "purple-600", "purple-700", "purple-800", "purple-900", "purple-A100", "purple-A200", "purple-A400", "purple-A700", "deep-purple-500", "deep-purple-50", "deep-purple-100", "deep-purple-200", "deep-purple-300", "deep-purple-400", "deep-purple-600", "deep-purple-700", "deep-purple-800", "deep-purple-900", "deep-purple-A100", "deep-purple-A200", "deep-purple-A400", "deep-purple-A700", "indigo-500", "indigo-50", "indigo-100", "indigo-200", "indigo-300", "indigo-400", "indigo-600", "indigo-700", "indigo-800", "indigo-900", "indigo-A100", "indigo-A200", "indigo-A400", "indigo-A700", "blue-500", "blue-50", "blue-100", "blue-200", "blue-300", "blue-400", "blue-600", "blue-700", "blue-800", "blue-900", "blue-A100", "blue-A200", "blue-A400", "blue-A700", "light-blue-500", "light-blue-50", "light-blue-100", "light-blue-200", "light-blue-300", "light-blue-400", "light-blue-600", "light-blue-700", "light-blue-800", "light-blue-900", "light-blue-A100", "light-blue-A200", "light-blue-A400", "light-blue-A700", "cyan-500", "cyan-50", "cyan-100", "cyan-200", "cyan-300", "cyan-400", "cyan-600", "cyan-700", "cyan-800", "cyan-900", "cyan-A100", "cyan-A200", "cyan-A400", "cyan-A700", "teal-500", "teal-50", "teal-100", "teal-200", "teal-300", "teal-400", "teal-600", "teal-700", "teal-800", "teal-900", "teal-A100", "teal-A200", "teal-A400", "teal-A700", "green-500", "green-50", "green-100", "green-200", "green-300", "green-400", "green-600", "green-700", "green-800", "green-900", "green-A100", "green-A200", "green-A400", "green-A700", "light-green-500", "light-green-50", "light-green-100", "light-green-200", "light-green-300", "light-green-400", "light-green-600", "light-green-700", "light-green-800", "light-green-900", "light-green-A100", "light-green-A200", "light-green-A400", "light-green-A700", "lime-500", "lime-50", "lime-100", "lime-200", "lime-300", "lime-400", "lime-600", "lime-700", "lime-800", "lime-900", "lime-A100", "lime-A200", "lime-A400", "lime-A700", "yellow-500", "yellow-50", "yellow-100", "yellow-200", "yellow-300", "yellow-400", "yellow-600", "yellow-700", "yellow-800", "yellow-900", "yellow-A100", "yellow-A200", "yellow-A400", "yellow-A700", "amber-500", "amber-50", "amber-100", "amber-200", "amber-300", "amber-400", "amber-600", "amber-700", "amber-800", "amber-900", "amber-A100", "amber-A200", "amber-A400", "amber-A700", "orange-500", "orange-50", "orange-100", "orange-200", "orange-300", "orange-400", "orange-600", "orange-700", "orange-800", "orange-900", "orange-A100", "orange-A200", "orange-A400", "orange-A700", "deep-orange-500", "deep-orange-50", "deep-orange-100", "deep-orange-200", "deep-orange-300", "deep-orange-400", "deep-orange-600", "deep-orange-700", "deep-orange-800", "deep-orange-900", "deep-orange-A100", "deep-orange-A200", "deep-orange-A400", "deep-orange-A700", "brown-500", "brown-50", "brown-100", "brown-200", "brown-300", "brown-400", "brown-600", "brown-700", "brown-800", "brown-900", "grey-500", "grey-50", "grey-100", "grey-200", "grey-300", "grey-400", "grey-600", "grey-700", "grey-800", "grey-900", "blue-grey-500", "blue-grey-50", "blue-grey-100", "blue-grey-200", "blue-grey-300", "blue-grey-400", "blue-grey-600", "blue-grey-700", "blue-grey-800", "blue-grey-900", "black-1000", "white-1000");
    $materialDataHex = array("#f44336", "#ffebee", "#ffcdd2", "#ef9a9a", "#e57373", "#ef5350", "#e53935", "#d32f2f", "#c62828", "#b71c1c", "#ff8a80", "#ff5252", "#ff1744", "#d50000", "#e91e63", "#fce4ec", "#f8bbd0", "#f48fb1", "#f06292", "#ec407a", "#d81b60", "#c2185b", "#ad1457", "#880e4f", "#ff80ab", "#ff4081", "#f50057", "#c51162", "#9c27b0", "#f3e5f5", "#e1bee7", "#ce93d8", "#ba68c8", "#ab47bc", "#8e24aa", "#7b1fa2", "#6a1b9a", "#4a148c", "#ea80fc", "#e040fb", "#d500f9", "#aa00ff", "#673ab7", "#ede7f6", "#d1c4e9", "#b39ddb", "#9575cd", "#7e57c2", "#5e35b1", "#512da8", "#4527a0", "#311b92", "#b388ff", "#7c4dff", "#651fff", "#6200ea", "#3f51b5", "#e8eaf6", "#c5cae9", "#9fa8da", "#7986cb", "#5c6bc0", "#3949ab", "#303f9f", "#283593", "#1a237e", "#8c9eff", "#536dfe", "#3d5afe", "#304ffe", "#2196f3", "#e3f2fd", "#bbdefb", "#90caf9", "#64b5f6", "#42a5f5", "#1e88e5", "#1976d2", "#1565c0", "#0d47a1", "#82b1ff", "#448aff", "#2979ff", "#2962ff", "#03a9f4", "#e1f5fe", "#b3e5fc", "#81d4fa", "#4fc3f7", "#29b6f6", "#039be5", "#0288d1", "#0277bd", "#01579b", "#80d8ff", "#40c4ff", "#00b0ff", "#0091ea", "#00bcd4", "#e0f7fa", "#b2ebf2", "#80deea", "#4dd0e1", "#26c6da", "#00acc1", "#0097a7", "#00838f", "#006064", "#84ffff", "#18ffff", "#00e5ff", "#00b8d4", "#009688", "#e0f2f1", "#b2dfdb", "#80cbc4", "#4db6ac", "#26a69a", "#00897b", "#00796b", "#00695c", "#004d40", "#a7ffeb", "#64ffda", "#1de9b6", "#00bfa5", "#4caf50", "#e8f5e9", "#c8e6c9", "#a5d6a7", "#81c784", "#66bb6a", "#43a047", "#388e3c", "#2e7d32", "#1b5e20", "#b9f6ca", "#69f0ae", "#00e676", "#00c853", "#8bc34a", "#f1f8e9", "#dcedc8", "#c5e1a5", "#aed581", "#9ccc65", "#7cb342", "#689f38", "#558b2f", "#33691e", "#ccff90", "#b2ff59", "#76ff03", "#64dd17", "#cddc39", "#f9fbe7", "#f0f4c3", "#e6ee9c", "#dce775", "#d4e157", "#c0ca33", "#afb42b", "#9e9d24", "#827717", "#f4ff81", "#eeff41", "#c6ff00", "#aeea00", "#ffeb3b", "#fffde7", "#fff9c4", "#fff59d", "#fff176", "#ffee58", "#fdd835", "#fbc02d", "#f9a825", "#f57f17", "#ffff8d", "#ffff00", "#ffea00", "#ffd600", "#ffc107", "#fff8e1", "#ffecb3", "#ffe082", "#ffd54f", "#ffca28", "#ffb300", "#ffa000", "#ff8f00", "#ff6f00", "#ffe57f", "#ffd740", "#ffc400", "#ffab00", "#ff9800", "#fff3e0", "#ffe0b2", "#ffcc80", "#ffb74d", "#ffa726", "#fb8c00", "#f57c00", "#ef6c00", "#e65100", "#ffd180", "#ffab40", "#ff9100", "#ff6d00", "#ff5722", "#fbe9e7", "#ffccbc", "#ffab91", "#ff8a65", "#ff7043", "#f4511e", "#e64a19", "#d84315", "#bf360c", "#ff9e80", "#ff6e40", "#ff3d00", "#dd2c00", "#795548", "#efebe9", "#d7ccc8", "#bcaaa4", "#a1887f", "#8d6e63", "#6d4c41", "#5d4037", "#4e342e", "#3e2723", "#9e9e9e", "#fafafa", "#f5f5f5", "#eeeeee", "#e0e0e0", "#bdbdbd", "#757575", "#616161", "#424242", "#212121", "#607d8b", "#eceff1", "#cfd8dc", "#b0bec5", "#90a4ae", "#78909c", "#546e7a", "#455a64", "#37474f", "#263238", "#000000", "#ffffff");
    //$materialDataCorrectNames = array("Red 500", "Red 50", "Red 100", "Red 200", "Red 300", "Red 400", "Red 600", "Red 700", "Red 800", "Red 900", "Red A100", "Red A200", "Red A400", "Red A700", "Pink 500", "Pink 50", "Pink 100", "Pink 200", "Pink 300", "Pink 400", "Pink 600", "Pink 700", "Pink 800", "Pink 900", "Pink A100", "Pink A200", "Pink A400", "Pink A700", "Purple 500", "Purple 50", "Purple 100", "Purple 200", "Purple 300", "Purple 400", "Purple 600", "Purple 700", "Purple 800", "Purple 900", "Purple A100", "Purple A200", "Purple A400", "Purple A700", "Deep Purple 500", "Deep Purple 50", "Deep Purple 100", "Deep Purple 200", "Deep Purple 300", "Deep Purple 400", "Deep Purple 600", "Deep Purple 700", "Deep Purple 800", "Deep Purple 900", "Deep Purple A100", "Deep Purple A200", "Deep Purple A400", "Deep Purple A700", "Indigo 500", "Indigo 50", "Indigo 100", "Indigo 200", "Indigo 300", "Indigo 400", "Indigo 600", "Indigo 700", "Indigo 800", "Indigo 900", "Indigo A100", "Indigo A200", "Indigo A400", "Indigo A700", "Blue 500", "Blue 50", "Blue 100", "Blue 200", "Blue 300", "Blue 400", "Blue 600", "Blue 700", "Blue 800", "Blue 900", "Blue A100", "Blue A200", "Blue A400", "Blue A700", "Light Blue 500", "Light Blue 50", "Light Blue 100", "Light Blue 200", "Light Blue 300", "Light Blue 400", "Light Blue 600", "Light Blue 700", "Light Blue 800", "Light Blue 900", "Light Blue A100", "Light Blue A200", "Light Blue A400", "Light Blue A700", "Cyan 500", "Cyan 50", "Cyan 100", "Cyan 200", "Cyan 300", "Cyan 400", "Cyan 600", "Cyan 700", "Cyan 800", "Cyan 900", "Cyan A100", "Cyan A200", "Cyan A400", "Cyan A700", "Teal 500", "Teal 50", "Teal 100", "Teal 200", "Teal 300", "Teal 400", "Teal 600", "Teal 700", "Teal 800", "Teal 900", "Teal A100", "Teal A200", "Teal A400", "Teal A700", "Green 500", "Green 50", "Green 100", "Green 200", "Green 300", "Green 400", "Green 600", "Green 700", "Green 800", "Green 900", "Green A100", "Green A200", "Green A400", "Green A700", "Light Green 500", "Light Green 50", "Light Green 100", "Light Green 200", "Light Green 300", "Light Green 400", "Light Green 600", "Light Green 700", "Light Green 800", "Light Green 900", "Light Green A100", "Light Green A200", "Light Green A400", "Light Green A700", "Lime 500", "Lime 50", "Lime 100", "Lime 200", "Lime 300", "Lime 400", "Lime 600", "Lime 700", "Lime 800", "Lime 900", "Lime A100", "Lime A200", "Lime A400", "Lime A700", "Yellow 500", "Yellow 50", "Yellow 100", "Yellow 200", "Yellow 300", "Yellow 400", "Yellow 600", "Yellow 700", "Yellow 800", "Yellow 900", "Yellow A100", "Yellow A200", "Yellow A400", "Yellow A700", "Amber 500", "Amber 50", "Amber 100", "Amber 200", "Amber 300", "Amber 400", "Amber 600", "Amber 700", "Amber 800", "Amber 900", "Amber A100", "Amber A200", "Amber A400", "Amber A700", "Orange 500", "Orange 50", "Orange 100", "Orange 200", "Orange 300", "Orange 400", "Orange 600", "Orange 700", "Orange 800", "Orange 900", "Orange A100", "Orange A200", "Orange A400", "Orange A700", "Deep Orange 500", "Deep Orange 50", "Deep Orange 100", "Deep Orange 200", "Deep Orange 300", "Deep Orange 400", "Deep Orange 600", "Deep Orange 700", "Deep Orange 800", "Deep Orange 900", "Deep Orange A100", "Deep Orange A200", "Deep Orange A400", "Deep Orange A700", "Brown 500", "Brown 50", "Brown 100", "Brown 200", "Brown 300", "Brown 400", "Brown 600", "Brown 700", "Brown 800", "Brown 900", "Grey 500", "Grey 50", "Grey 100", "Grey 200", "Grey 300", "Grey 400", "Grey 600", "Grey 700", "Grey 800", "Grey 900", "Blue Grey 500", "Blue Grey 50", "Blue Grey 100", "Blue Grey 200", "Blue Grey 300", "Blue Grey 400", "Blue Grey 600", "Blue Grey 700", "Blue Grey 800", "Blue Grey 900", "Black 1000", "White 1000");
    //$materialDataRGB = array("rgb(244,67,54)", "rgb(255,235,238)", "rgb(255,205,210)", "rgb(239,154,154)", "rgb(229,115,115)", "rgb(239,83,80)", "rgb(229,57,53)", "rgb(211,47,47)", "rgb(198,40,40)", "rgb(183,28,28)", "rgb(255,138,128)", "rgb(255,82,82)", "rgb(255,23,68)", "rgb(213,0,0)", "rgb(233,30,99)", "rgb(252,228,236)", "rgb(248,187,208)", "rgb(244,143,177)", "rgb(240,98,146)", "rgb(236,64,122)", "rgb(216,27,96)", "rgb(194,24,91)", "rgb(173,20,87)", "rgb(136,14,79)", "rgb(255,128,171)", "rgb(255,64,129)", "rgb(245,0,87)", "rgb(197,17,98)", "rgb(156,39,176)", "rgb(243,229,245)", "rgb(225,190,231)", "rgb(206,147,216)", "rgb(186,104,200)", "rgb(171,71,188)", "rgb(142,36,170)", "rgb(123,31,162)", "rgb(106,27,154)", "rgb(74,20,140)", "rgb(234,128,252)", "rgb(224,64,251)", "rgb(213,0,249)", "rgb(170,0,255)", "rgb(103,58,183)", "rgb(237,231,246)", "rgb(209,196,233)", "rgb(179,157,219)", "rgb(149,117,205)", "rgb(126,87,194)", "rgb(94,53,177)", "rgb(81,45,168)", "rgb(69,39,160)", "rgb(49,27,146)", "rgb(179,136,255)", "rgb(124,77,255)", "rgb(101,31,255)", "rgb(98,0,234)", "rgb(63,81,181)", "rgb(232,234,246)", "rgb(197,202,233)", "rgb(159,168,218)", "rgb(121,134,203)", "rgb(92,107,192)", "rgb(57,73,171)", "rgb(48,63,159)", "rgb(40,53,147)", "rgb(26,35,126)", "rgb(140,158,255)", "rgb(83,109,254)", "rgb(61,90,254)", "rgb(48,79,254)", "rgb(33,150,243)", "rgb(227,242,253)", "rgb(187,222,251)", "rgb(144,202,249)", "rgb(100,181,246)", "rgb(66,165,245)", "rgb(30,136,229)", "rgb(25,118,210)", "rgb(21,101,192)", "rgb(13,71,161)", "rgb(130,177,255)", "rgb(68,138,255)", "rgb(41,121,255)", "rgb(41,98,255)", "rgb(3,169,244)", "rgb(225,245,254)", "rgb(179,229,252)", "rgb(129,212,250)", "rgb(79,195,247)", "rgb(41,182,246)", "rgb(3,155,229)", "rgb(2,136,209)", "rgb(2,119,189)", "rgb(1,87,155)", "rgb(128,216,255)", "rgb(64,196,255)", "rgb(0,176,255)", "rgb(0,145,234)", "rgb(0,188,212)", "rgb(224,247,250)", "rgb(178,235,242)", "rgb(128,222,234)", "rgb(77,208,225)", "rgb(38,198,218)", "rgb(0,172,193)", "rgb(0,151,167)", "rgb(0,131,143)", "rgb(0,96,100)", "rgb(132,255,255)", "rgb(24,255,255)", "rgb(0,229,255)", "rgb(0,184,212)", "rgb(0,150,136)", "rgb(224,242,241)", "rgb(178,223,219)", "rgb(128,203,196)", "rgb(77,182,172)", "rgb(38,166,154)", "rgb(0,137,123)", "rgb(0,121,107)", "rgb(0,105,92)", "rgb(0,77,64)", "rgb(167,255,235)", "rgb(100,255,218)", "rgb(29,233,182)", "rgb(0,191,165)", "rgb(76,175,80)", "rgb(232,245,233)", "rgb(200,230,201)", "rgb(165,214,167)", "rgb(129,199,132)", "rgb(102,187,106)", "rgb(67,160,71)", "rgb(56,142,60)", "rgb(46,125,50)", "rgb(27,94,32)", "rgb(185,246,202)", "rgb(105,240,174)", "rgb(0,230,118)", "rgb(0,200,83)", "rgb(139,195,74)", "rgb(241,248,233)", "rgb(220,237,200)", "rgb(197,225,165)", "rgb(174,213,129)", "rgb(156,204,101)", "rgb(124,179,66)", "rgb(104,159,56)", "rgb(85,139,47)", "rgb(51,105,30)", "rgb(204,255,144)", "rgb(178,255,89)", "rgb(118,255,3)", "rgb(100,221,23)", "rgb(205,220,57)", "rgb(249,251,231)", "rgb(240,244,195)", "rgb(230,238,156)", "rgb(220,231,117)", "rgb(212,225,87)", "rgb(192,202,51)", "rgb(175,180,43)", "rgb(158,157,36)", "rgb(130,119,23)", "rgb(244,255,129)", "rgb(238,255,65)", "rgb(198,255,0)", "rgb(174,234,0)", "rgb(255,235,59)", "rgb(255,253,231)", "rgb(255,249,196)", "rgb(255,245,157)", "rgb(255,241,118)", "rgb(255,238,88)", "rgb(253,216,53)", "rgb(251,192,45)", "rgb(249,168,37)", "rgb(245,127,23)", "rgb(255,255,141)", "rgb(255,255,0)", "rgb(255,234,0)", "rgb(255,214,0)", "rgb(255,193,7)", "rgb(255,248,225)", "rgb(255,236,179)", "rgb(255,224,130)", "rgb(255,213,79)", "rgb(255,202,40)", "rgb(255,179,0)", "rgb(255,160,0)", "rgb(255,143,0)", "rgb(255,111,0)", "rgb(255,229,127)", "rgb(255,215,64)", "rgb(255,196,0)", "rgb(255,171,0)", "rgb(255,152,0)", "rgb(255,243,224)", "rgb(255,224,178)", "rgb(255,204,128)", "rgb(255,183,77)", "rgb(255,167,38)", "rgb(251,140,0)", "rgb(245,124,0)", "rgb(239,108,0)", "rgb(230,81,0)", "rgb(255,209,128)", "rgb(255,171,64)", "rgb(255,145,0)", "rgb(255,109,0)", "rgb(255,87,34)", "rgb(251,233,231)", "rgb(255,204,188)", "rgb(255,171,145)", "rgb(255,138,101)", "rgb(255,112,67)", "rgb(244,81,30)", "rgb(230,74,25)", "rgb(216,67,21)", "rgb(191,54,12)", "rgb(255,158,128)", "rgb(255,110,64)", "rgb(255,61,0)", "rgb(221,44,0)", "rgb(121,85,72)", "rgb(239,235,233)", "rgb(215,204,200)", "rgb(188,170,164)", "rgb(161,136,127)", "rgb(141,110,99)", "rgb(109,76,65)", "rgb(93,64,55)", "rgb(78,52,46)", "rgb(62,39,35)", "rgb(158,158,158)", "rgb(250,250,250)", "rgb(245,245,245)", "rgb(238,238,238)", "rgb(224,224,224)", "rgb(189,189,189)", "rgb(117,117,117)", "rgb(97,97,97)", "rgb(66,66,66)", "rgb(33,33,33)", "rgb(96,125,139)", "rgb(236,239,241)", "rgb(207,216,220)", "rgb(176,190,197)", "rgb(144,164,174)", "rgb(120,144,156)", "rgb(84,110,122)", "rgb(69,90,100)", "rgb(55,71,79)", "rgb(38,50,56)", "rgb(0,0,0)", "rgb(255,255,255)");
    $compareResult = array();

    for ($i = 0; $i < count($materialData); $i++) {
        $materialColor = explode(" ", $materialData[$i]);
        $materialRed = $materialColor[0];
        $materialGreen = $materialColor[1];
        $materialBlue = $materialColor[2];
        $compareResult[$i] = abs($materialRed - $red) + abs($materialGreen - $green) + abs($materialBlue - $blue);
    }

    $half = (255 + 255 + 255) / 2;

    $closestMaterial = min($compareResult);
    $closestMaterialID = array_search($closestMaterial, $compareResult);
    $compareResult[$closestMaterialID] += 999999;
    $closestMaterial = min($compareResult);
    $closestMaterialID = array_search($closestMaterial, $compareResult);


    $nums = explode(" ", $materialData[$closestMaterialID]);

    $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
    }

    $closestLight = "";
    if ($sum > $half) {
        $closestLight = "black";
    } else {
        $closestLight = "white";
    }
    //$closestMaterialHex = $materialDataHex[$closestMaterialID];
    //$closestMaterialName = $materialDataNames[$closestMaterialID];
    //$closestMaterialCorrectName = $materialDataCorrectNames[$closestMaterialID];
    //$closestMaterialRGB = $materialDataRGB[$closestMaterialID];
    //$closestMaterialHexNoPound = str_replace("#", "", $closestMaterialHex);
    //$closestMaterialHexAlpha = $closestMaterialHex  . "ff";
    //$closestMaterialHexAlphaNoPound = str_replace("#", "",$closestMaterialHexAlpha);
    //$closestMaterialRGBNoFormatting = str_replace(")", "",str_replace("rgb(", "",$closestMaterialRGB));
    //$closestMaterialRGBA = str_replace(")", ",1)",str_replace("rgb(", "rgba(",$closestMaterialRGB));
    //$closestMaterialRGBANoFormatting = str_replace(")", "",str_replace("rgba(", "",$closestMaterialRGBA));

    return array($materialDataHex[$closestMaterialID], $closestLight);
}

function getMaterialColorForImage($img, $type, $method) {

    $mainColor = "#000000";
    if ($method == 'slow') {
        $delta = 24;
        $reduce_brightness = false;
        $reduce_gradients = false;
        $num_results = 3;

        if ($type == 'png' || $type == 'png') {
            $ex = new GetMostCommonColors();
            $color = $ex->Get_Color($img, $num_results, $reduce_brightness, $reduce_gradients, $delta);
            $mainColor = "#000000";

            foreach ($color as $hex => $percent) {
                if ($hex != '000000' && $hex != 'ffffff') {
                    $mainColor = "#" . $hex;
                    break;
                }
            }
        }
    } else if ($method == 'fast') {
        if ($type == 'png') {
            $image = imagecreatefrompng($img);
            $thumb = imagecreatetruecolor(1, 1);
            imagecopyresampled($thumb, $image, 0, 0, 0, 0, 1, 1, imagesx($image), imagesy($image));
            $mainColor = strtoupper(dechex(imagecolorat($thumb, 0, 0)));
        } else if ($type == 'jpg') {
            $image = imagecreatefromjpeg(str_replace(".png", ".jpg", $img));
            $thumb = imagecreatetruecolor(1, 1);
            imagecopyresampled($thumb, $image, 0, 0, 0, 0, 1, 1, imagesx($image), imagesy($image));
            $mainColor = strtoupper(dechex(imagecolorat($thumb, 0, 0)));
        }
    } else {
        $colorValues = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");

        $mainColor = "";
        for ($index = 0; $index < 6; $index++) {
            $mainColor = $mainColor . $colorValues[rand(0, 15)];
        }
        $mainColor = "#" . $mainColor;
    }


    while (strlen($mainColor) < 6) {
        $mainColor = "0" . $mainColor;
    }




    $materialHexColor = hexColorToMaterial($mainColor);
    $materialHexColor[] = $mainColor;
    return $materialHexColor;
}
