Quintus.PLCInput = function(Q) {
	
	Q.Class.extend("ProblemInputHandler", {
		init: function(team, inputBox) {
			this.maxInputLength = 12;
			this.team = team;
			this.answer = "";
			this.inputBox = inputBox;

			Q.input.on("enter", this, function(){
				

				var solvedUnit = null;
				var units = this.team.getUnits();
				for (var i = 0; i < units.length; i++) {
					var unit = units[i];
					if(unit.hasProblem() && unit.p.problem.checkAnswer(this.answer)) {
						solvedUnit = unit;
						break;
					}
				}

				//Clear answer. We need to do this first because setInput interferes with
				//setInputCorrect() and setInputIncorrect()
				this.answer = "";
				inputBox.setInput(this.answer);

				if(solvedUnit != null) {
					inputBox.setInputCorrect();
					solvedUnit.solveQuestion();
				} else {
					inputBox.setInputIncorrect();
				}
			});

			 //concats a 1 to the answer
			Q.input.on("one", this , function() {
				if(this.answer.length < this.maxInputLength){
					this.answer = this.answer.concat("1");
					inputBox.setInput(this.answer);
				}
			});
            //concats a 0 to the answer
			Q.input.on("zero", this , function() {
				if(this.answer.length < this.maxInputLength){
					this.answer = this.answer.concat("0");
					inputBox.setInput(this.answer);
				}
			});
			
			//concats a A to the answer
			Q.input.on("A", this , function() {
				if(this.answer.length < this.maxInputLength-1){
					this.answer = this.answer.concat("A");
					inputBox.setInput(this.answer);
				}
			});
			
			//concats a B to the answer
			Q.input.on("B", this , function() {
				if(this.answer.length < this.maxInputLength-1){
					this.answer = this.answer.concat("B");
					inputBox.setInput(this.answer);
				}
			});
			
			//concats a C to the answer
			Q.input.on("C", this , function() {
				if(this.answer.length < this.maxInputLength-1){
					this.answer = this.answer.concat("C");
					inputBox.setInput(this.answer);
				}
			});
			
			//concats a D to the answer
			Q.input.on("D", this , function() {
				if(this.answer.length < this.maxInputLength-1){
					this.answer = this.answer.concat("D");
					inputBox.setInput(this.answer);
				}
			});
			
			//concats a E to the answer
			Q.input.on("E", this , function() {
				if(this.answer.length < this.maxInputLength-1){
					this.answer = this.answer.concat("E");
					inputBox.setInput(this.answer);
				}
			});
			
			//concats a F to the answer
			Q.input.on("F", this , function() {
				if(this.answer.length < this.maxInputLength-1){
					this.answer = this.answer.concat("F");
					inputBox.setInput(this.answer);
				}
			});
						
            //removes the last added digit
            Q.input.on('backspace', this, function() {
                if(this.answer.length > 0)
                   this.answer = this.answer.substring(0,this.answer.length - 1);
				inputBox.setInput(this.answer);
            });
			//remove last added digit with decimal on keypad
			Q.input.on('delete', this, function(){
                if(this.answer.length > 0)
                   this.answer = this.answer.substring(0,this.answer.length - 1);
				inputBox.setInput(this.answer);
            });
            //clears the answer
            Q.input.on('escape', this, function(){
                this.answer = "";
				inputBox.setInput(this.answer);
            });
		},
	});
}
