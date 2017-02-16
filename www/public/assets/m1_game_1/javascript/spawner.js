/*
* Team - The team class that we are spawning units for.
* Units - a list of the form [[UnitClass, spawnRate],[UnitClass,spawnRate]]. UnitClass is the class of the unit. 
*		spawnRate is the size of the number range used when generating random numbers
* minimumSpawnRate - the smallest amount of time that can pass before another unit can
* spawn
* maximumSpawnRate - the largest amount of time that it can take for the next unit to spawnRate
*currently, spawnRates are tacken in calls to the update function and not in deltaTimes - assume
* it is 60 updates per second
*
*/
Quintus.PLCUnitSpawner = function(Q) {
	UnitSpawner = function(team, units, minimumSpawnRate, maximumSpawnRate, spawnRateController) {
		this.team = team;
		this.units = units;
		this.minimumSpawnRate = minimumSpawnRate;
		this.maximumSpawnRate = maximumSpawnRate;
		this.unitRanges = [];
		
		if(spawnRateController == undefined) {
			this.spawnRateController = new SpawnRateController();
		} else {
			this.spawnRateController = spawnRateController;
		}
		
		//Construct a list that gives us what numbers spawn each robot. Eventually, to spawn a robot, we will
		//select a random number and then figure out who's range of numbers that falls in.
		//So we will chose a unit if unitMin<=random<unitMax (Matches Math.rand() range of [0,1))
		this.unitTotal = 0;
		this.ranges = [];
		for(i = 0; i < units.length; i++) {
			var unitPair = units[i];
			var unitSpecs = {};
			//e.g. 0
			unitSpecs["min"] = this.unitTotal;
			this.unitTotal += unitPair[1];
			//e.g. if the range size is 7 then unitTotal = 7 and we want max=7 to get a range of 7
			unitSpecs["max"] = this.unitTotal;
			unitSpecs["class"] = unitPair[0];
			this.ranges.push(unitSpecs);
		}
		
		this.nextSpawn = -1;
	}

	UnitSpawner.prototype.update = function(dt) {
		if(this.nextSpawn == -1) {
			// -1 means we aren't initialized yet.
			this.nextSpawn = this.getNextSpawn();
		} 
		
		this.nextSpawn--;
		if(this.nextSpawn <= 0) {
			this.spawnUnit();
			this.nextSpawn = this.getNextSpawn();
		}

		this.setMinimumSpawnRate(this.spawnRateController.changeMin(this));
		this.setMaximumSpawnRate(this.spawnRateController.changeMax(this));
		//console.log(this.maximumSpawnRate);
	}

	//Random integer with range [min,max)
	UnitSpawner.prototype.getRandomInt = function(min, max) {
		return Math.floor(Math.random()*(max-min) + min);
	}

	UnitSpawner.prototype.getNextSpawn = function() {
		return this.getRandomInt(this.minimumSpawnRate, this.maximumSpawnRate);
	}

	UnitSpawner.prototype.spawnUnit = function() {
		var randomNumber = this.getRandomInt(0, this.unitTotal);
		var foundRange = null;
		
		for(i=0; i < this.ranges.length; i++) {
			var range = this.ranges[i];
			if(range["min"] <= randomNumber && randomNumber < range["max"]) {
				foundRage = range;
				break;
			}
		}
		
		if(foundRange == null) {
			//Uhhhh... Can this happen??????
		}
		
		var newBot = new range["class"]();
		newBot.setY(Q.state.map.p.unitSpawnY);
		newBot.setX(this.getRandomInt(Q.state.map.p.unitSpawnXMin, Q.state.map.p.unitSpawnXMax - Q.state.map.p.unitSpawnXMin));
		this.team.addUnit(newBot);
	}
	
	UnitSpawner.prototype.setMinimumSpawnRate = function(newMin) {
		if(newMin < this.maximumSpawnRate && newMin > 0) {
			this.minimumSpawnRate = newMin;
		}
	}
	
	UnitSpawner.prototype.setMaximumSpawnRate = function(newMax) {
		if(newMax > this.minimumSpawnRate) {
			this.maximumSpawnRate = newMax;
		}
	}
	
	
	SpawnRateController = function() {
		this.maxTickDefault = 300;
		this.maxTick = 300;
		
		/* this.minTickDefault = 300;
		this.minTick = 300; */
	}

	SpawnRateController.prototype.changeMin = function(unitSpawner) {
		/* this.minTick--;
		if(this.minTick <= 0) {
			this.minTick = this.minTickDefault;
			return unitSpawner.minimumSpawnRate - 25;
		} */
		return unitSpawner.minimumSpawnRate;
	}
	
	SpawnRateController.prototype.changeMax = function(unitSpawner) {
		this.maxTick--;
		if(this.maxTick <= 0) {
			this.maxTick = this.maxTickDefault;
			return unitSpawner.maximumSpawnRate - 10;
		}
		
		return unitSpawner.maximumSpawnRate;
	}
}
