/**
 * Created by Bochao on 8/13/2014.
 */

//var table_1 = []; // and gate
//var row_1_1 = [0,0,0];
//var row_1_2 = [0,1,0];
//var row_1_3 = [1,0,0];
//var row_1_4 = [1,1,1];
//
//table_1 = [row_1_1 , row_1_2, row_1_3, row_1_4];
var table_1_exp = "input_list[0] && input_list[1]";
var table_1_num = 2;
//----------------------------------------

//var table_2 = []; // and or
//var row_2_1 = [0,0,0];
//var row_2_2 = [0,1,1];
//var row_2_3 = [1,0,1];
//var row_2_4 = [1,1,1];
//
//table_2 = [row_2_1, row_2_2, row_2_3, row_2_4];
var table_2_exp = "input_list[0] || input_list[1]";
var table_2_num = 2;
//----------------------------------------

//var table_3 = []; // not gate
//var row_3_1 = [0,1];
//var row_3_2 = [1,0];
////var row_3_3 = [1,0,0];
////var row_3_4 = [1,1,1];
//
//table_3 = [row_3_1, row_3_2];
var table_3_exp = "!input_list[0]";
var table_3_num = 1;
//----------------------------------------

//var table_4 = []; // NAND gate
//var row_4_1 = [0,0,1];
//var row_4_2 = [0,1,1];
//var row_4_3 = [1,0,1];
//var row_4_4 = [1,1,0];
//
//table_4 = [row_4_1, row_4_2, row_4_3, row_4_4];
var table_4_exp = "!(input_list[0] && input_list[1])";
var table_4_num = 2;
//----------------------------------------

//var table_5 = []; // NOR gate
//var row_5_1 = [0,0,1];
//var row_5_2 = [0,1,0];
//var row_5_3 = [1,0,0];
//var row_5_4 = [1,1,0];
//
//table_5 = [row_5_1, row_5_2, row_5_3, row_5_4];
var table_5_exp = "!(input_list[0] || input_list[1])";
var table_5_num = 2;
//----------------------------------------

//var table_6 = []; // XOR gate
//var row_6_1 = [0,0,0];
//var row_6_2 = [0,1,1];
//var row_6_3 = [1,0,1];
//var row_6_4 = [1,1,0];
//
//table_6 = [row_6_1, row_6_2, row_6_3, row_6_4];
var table_6_exp = "input_list[0] ^ input_list[1]";
var table_6_num = 2;

//var xxx = 14;
//var yyy = xxx.toString(2);
//----------------------------------------

//var table_7 = []; // and gate
//var row_7_1 = [0,0,0];
//var row_7_2 = [0,1,0];
//var row_7_3 = [1,0,0];
//var row_7_4 = [1,1,1];
//
//table_7 = [row_7_1, row_7_2, row_7_3, row_7_4];
var table_7_exp = "input_list[0] && input_list[1] || !(input_list[1])";
var table_7_num = 2;
//----------------------------------------

//var table_8 = []; // and gate
//var row_8_1 = [0,0,0,0,0];
//var row_8_2 = [0,1,0];
//var row_8_3 = [1,0,0];
//var row_8_4 = [1,1,1];
//
//
//table_8 = [row_8_1, row_8_2, row_8_3, row_8_4];
var table_8_exp = "(input_list[0] || input_list[1]) && (!input_list[2] && input_list[3])";
var table_8_num = 4;
//----------------------------------------

//var table_9 = []; // and gate
//var row_9_1 = [0,0,0];
//var row_9_2 = [0,1,0];
//var row_9_3 = [1,0,0];
//var row_9_4 = [1,1,1];
//
//table_9 = [row_9_1, row_9_2, row_9_3, row_9_4];
var table_14_exp = "(input_list[0] ^ input_list[1]) && input_list[2]";
var table_14_num = 3;
//----------------------------------------

//var table_10 = []; // and gate
//var row_10_1 = [0,0,0];
//var row_10_2 = [0,1,0];
//var row_10_3 = [1,0,0];
//var row_10_4 = [1,1,1];
//
//table_10 = [row_10_1, row_10_2, row_10_3, row_10_4];
var table_10_exp = "(input_list[0] || input_list[1]) && (input_list[0] || input_list[2])";
var table_10_num = 3;
//----------------------------------------

//var table_11 = []; // and gate
//var row_11_1 = [0,0,0];
//var row_11_2 = [0,1,0];
//var row_11_3 = [1,0,0];
//var row_11_4 = [1,1,1];
//
//table_11 = [row_11_1, row_11_2, row_11_3, row_11_4];
var table_16_exp = "(input_list[0] ^ input_list[1]) && (input_list[2] ^ input_list[3])";
var table_16_num = 4;
//----------------------------------------

var table_12_exp = "(!input_list[0]) && (!input_list[1])";
var table_12_num = 2;
//----------------------------------------

var table_13_exp = "(input_list[0] && input_list[1]) || !(input_list[0] && input_list[1])";
var table_13_num = 2;
//----------------------------------------

var table_9_exp = "(input_list[0] && !input_list[1]) || (input_list[1] && input_list[2])";
var table_9_num = 3;
//----------------------------------------

var table_15_exp = "!(!(input_list[0] || input_list[1]) && (input_list[2] ^ input_list[3]))";
var table_15_num = 4;
//----------------------------------------

var table_11_exp = "(input_list[0] && input_list[2]) || (input_list[1] && !input_list[3]) || (input_list[2] && !input_list[3])";
var table_11_num = 4;
//----------------------------------------

var table_17_exp = "((input_list[0] ^ input_list[1]) || !(input_list[1] && input_list[2])) && !input_list[3]";
var table_17_num = 4;
//----------------------------------------

var table_18_exp = "(input_list[0] && input_list[1]) && (input_list[2] ^ input_list[3])";
var table_18_num = 4;
//----------------------------------------

var table_19_exp = "(input_list[0] && input_list[1]) || (input_list[2] ^ input_list[3])";
var table_19_num = 4;
//----------------------------------------

var table_20_exp = "!((input_list[0] ^ input_list[1]) && (input_list[2] ^ input_list[3]))";
var table_20_num = 4;
//----------------------------------------

var table_21_exp = "!(input_list[0] && input_list[1]) || !(input_list[1])";
var table_21_num = 2;
//----------------------------------------

var table_22_exp = "!(!(input_list[0] || input_list[1]) && (!input_list[2] && input_list[3]))";
var table_22_num = 4;
//----------------------------------------

var table_23_exp = "!((input_list[0] && !input_list[1]) || !(input_list[1] && input_list[2]))";
var table_23_num = 3;
//----------------------------------------

var table_24_exp = "!(input_list[0] || input_list[1]) && !(input_list[0] || input_list[2])";
var table_24_num = 3;
//----------------------------------------

var table_25_exp = "!((input_list[0] && input_list[2]) || !(input_list[1] && !input_list[3]) || (input_list[2] && !input_list[3]))";
var table_25_num = 4;
//----------------------------------------

var table_26_exp = "(input_list[0] && input_list[1]) || !(input_list[0] && input_list[1])";
var table_26_num = 2;
//----------------------------------------