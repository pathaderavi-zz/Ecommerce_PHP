var NGO_List = ['select', 'Environmental Defense Incorporated','Modest Needs Foundation','Children Scholarship Fund','Women Enews'];
var NGO_address = ['257 Park Ave S, New York','115 E 30th St, New York','8 W 38th St, New York','6 Barclay Street 6th Floor New York NY 10007 USA']
var offices ;
function thanks()
{
	window.location = "thanks.html";
}
function setSelect(v) {
        var x = document.getElementById("bedroom");
        for (i = 0; i < x.length; ) { 
            x.remove(x.length -1);
        }
        var a;
        if (v=='yes'){
            a = NGO_List;
        } else if (v=='no'){
            a = offices;
        }
        for (i = 0; i < a.length; ++i) {
            var option = document.createElement("option");
            option.text = a[i];
            x.add(option);
        }
    }
    function load() {
        setSelect('yes');
    }
	function run() {
        document.getElementById("name").value = document.getElementById("bedroom").value;
		if( document.getElementById("bedroom").value == NGO_List[0])
		{
			document.getElementById("name").value = '';
		}
		if( document.getElementById("bedroom").value == NGO_List[0])
		{
			document.getElementById("address").value = '';
		}
		if( document.getElementById("bedroom").value == NGO_List[1])
		{
			document.getElementById("address").value = NGO_address[0];
		}
		if( document.getElementById("bedroom").value == NGO_List[2])
		{
			document.getElementById("address").value = NGO_address[1];
		}
		if( document.getElementById("bedroom").value == NGO_List[3])
		{
			document.getElementById("address").value = NGO_address[2];
		}
		if( document.getElementById("bedroom").value == NGO_List[4])
		{
			document.getElementById("address").value = NGO_address[3];
		}
	}
    window.onload = load;