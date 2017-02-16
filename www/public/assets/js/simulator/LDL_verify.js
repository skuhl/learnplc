/**
 * Created by bochao on 7/14/2014.
 */
function test_LDL() {
    clear_targets();
    P_list(aaa);
    match_name();

    reset_scene();
    my_matrix = new AJmatrix(aaa);
    myVar = setInterval(function () {
        main_cycle();
    }, 50);
}


function verify_name(){

}