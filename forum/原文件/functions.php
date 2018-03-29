<?php
function race($race){
	switch($race){
		case '1': $_race = "人类";
			break;
		case '2': $_race = "兽人";
			break;
		case '3': $_race = "矮人";
			break;
		case '4': $_race = "暗夜精灵";
			break;
		case '5': $_race = "亡灵";
			break;
		case '6': $_race = "牛头人";
			break;
		case '7': $_race = "侏儒";
			break;
		case '8': $_race = "巨魔";
			break;
		case '9': $_race = "地精";
			break;
		case '10': $_race = "血精灵";
			break;
		case '11': $_race = "德莱尼";
			break;
		case '22': $_race = "狼人";
			break;
		default: $_race = "所有种族";
	}
	return $_race;
}

function classx($classx){
switch($classx){
	case '1': $_class = "战士";
		break;
	case '2': $_class = "圣骑士";
		break;
	case '3': $_class = "猎人";
		break;
	case '4': $_class = "盗贼";
		break;
	case '5': $_class = "牧师";
		break;
	case '6': $_class = "死亡骑士";
		break;
	case '7': $_class = "萨满";
		break;
	case '8': $_class = "法师";
		break;
	case '9': $_class = "术士";
		break;
	case '11': $_class = "德鲁伊";
		break;
	default: $_class = "所有职业";
}
return $_class;
}

function quality($quality){
switch($quality){
case "普通":
return 0;
break;
case "常见":
return 1;
break;
case "稀有":
return 2;
break;
case "罕见":
return 3;
break;
case "史诗":
return 4;
break;
case "传说":
return 5;
break;
case "神器":
return 6;
break;
case "传家宝":
return 7;
break;
}}


?>