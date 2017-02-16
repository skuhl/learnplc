/* the adjacency matrix object represents the elements relationship in ladder logic
 * It is used in the simulation of the behavior of the PLC
 */
function AJmatrix(LDLgp){
	// initialize the matrix NxN
	var Nelement = LDLgp.element_N + 1;
	this.elematrix = [];
	for(var i=0; i<Nelement; i++){
		var elerow = [];
		for(var j=0; j<Nelement; j++){
			elerow[j] = 0;
		}
		this.elematrix[i] = elerow;
	}
	
	// add adjacent relationships
	Add_relations(this.elematrix, LDLgp);
	
//	var matrix_dialog = $("<div></div>");
//	matrix_dialog.dialog({
//		id: "my_matrix",
//		title: "Adjacency Matrix",
//		height: 300,
//		modal: true
//	});
//	matrix_dialog.html("<p>simulation matrix has successfully formed</p>");
//
//	var matrix_list = $("<table></table>");
//	for(var i=0; i<Nelement; i++){
//		var matrix_row = $("<tr></tr>");
//		for(var j=0; j<Nelement; j++){
//			matrix_row.append("<th>" + this.elematrix[i][j] + "</th>");
//		}
//		matrix_list.append(matrix_row);
//	}
//	matrix_dialog.append(matrix_list);
}

function Add_relations(matrix, LDLgp){
	var NodeID = 1;
	for(var i=0; i<LDLgp.getLine_N(); i++){
		// for each main rung in ladder logic
		for(var j=0; j<LDLgp.Line_Size[i]; j++){
			// for every first element in a rung
			if(j==0){
				if(LDLgp.LDL[i][j] instanceof element_node){
					matrix[0][NodeID] = 1;
					NodeID = NodeID + 1;
				}
				else if(LDLgp.LDL[i][j] instanceof element_bridge){
					NodeID = branch_relation(matrix, 0, LDLgp.LDL[i][j].element_group, NodeID);
				}
			}
			else{
				if(LDLgp.LDL[i][j] instanceof element_node){
					matrix[NodeID-1][NodeID]=1;
					NodeID = NodeID + 1;
				}
				else if(LDLgp.LDL[i][j] instanceof element_bridge){
					NodeID = branch_relation(matrix, NodeID-1, LDLgp.LDL[i][j].element_group, NodeID);
				}
			}
		}
	}
}

function branch_relation(matrix, start, group, ID){
    //calculate the end ID
    var endID = ID;
    endID = bridge_length(group, endID) - 1;
    //connect everything to start
    for (var i = 0; i < group.length; i++) {
        if(group[i].length>0) {
            for (var j = 0; j < group[i].length; j++) {
                if (j == 0) {
                    if (group[i][j] instanceof element_node) {
                        matrix[start][ID] = 1;
                        ID = ID + 1;
                    }
                    else if (group[i][j] instanceof element_bridge) {
                        ID = branch_relation(matrix, start, group[i][j].element_group, ID);
                    }
                }
                else {
                    if (group[i][j] instanceof element_node) {
                        matrix[ID - 1][ID] = 1;
                        ID = ID + 1;
                    }
                    else if (group[i][j] instanceof element_bridge) {
                        ID = branch_relation(matrix, ID - 1, group[i][j].element_group, ID);
                    }
                }
                //connect to end node
                if (j == group[i].length - 1) {
                    matrix[ID - 1][endID] = 1;
                }
            }
        }
        else{
            matrix[start][endID] = 1;
        }
    }

    ID++;
    return ID;

}

function bridge_length(group, endID){
	for(var i=0; i<group.length; i++){
		for(var j=0; j<group[i].length; j++){
			if(group[i][j] instanceof element_node){
				endID = endID + 1;
			}
			else if(group[i][j] instanceof element_bridge){
				endID = bridge_length(group[i][j].element_group, endID);
			}
		}
	}
	endID = endID + 1;
	return endID;
}