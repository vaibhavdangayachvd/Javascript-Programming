function increase_bet(bet_amt){
	var curr_bet=parseInt(document.betting.bet.value);
	var curr_bal=parseInt(document.betting.balance.value);
	if(curr_bal>=curr_bet+bet_amt)
	{
		document.betting.bet.value=curr_bet+=bet_amt;
		document.betting.notification.value="";
	}
	else
		document.betting.notification.value="You don't have enough coin balance.";
	document.betting.result.value="";
}
function reset_bet(){
	document.betting.bet.value=0;
	document.betting.notification.value="";
	document.betting.result.value="";
}
function check()
{
	if(document.betting.bet.value==0)
	{
		document.betting.notification.value="Please set the bet first.";
		return false;
	}
	document.betting.bet.disabled=false;
	return true;
}