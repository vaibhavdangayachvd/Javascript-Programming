let tudos={
	meetings:0,
	meet_done:0,
	add_meet:function(num){
		this.meetings+=num;
	},
	done:function(num){
		this.meet_done+=num;
	},
	summary:function(){
		console.log(`     Meetings : ${this.meetings}`);
		console.log(`Meetings Done : ${this.meet_done}`);
		console.log(`Meetings Left : ${this.meetings-this.meet_done}`);
	},
}
tudos.add_meet(5);
tudos.done(4);
tudos.summary();