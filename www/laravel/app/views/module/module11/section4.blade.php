<style>
#m5_ex1_workspace {
	font: 150% "Trebuchet MS", sans-serif;
	text-align: center
}
</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Data Communication') @section('section-menu')
@include('module.module11.menu') @stop @section('lesson')
<div class="lesson-title">Data Communication</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>What is Data Communication?</h3>
		<p style="text-indent: 1.5em">Data communication refers how PLCs
			transfer data to each other and other systems like SCADA tied to the
			network. In general there are two types of communication methods:
			point to point and local area network, LAN. Point to point
			communication system typically use serial connections and cables to
			directly connect one device to another. PLC controllers typically
			have serial ports attached to the processor and have the ability to
			add additional ports through modules. Despite the expandability of
			the number of serial ports a PLC can have, the controller is limited
			to how many devices can be connected together. Because of this point
			to point communication is typically limited to barcode readers,
			printers, HMIs, and other PLCs.</p>
		<br />
		<h3>LAN Stsyems</h3>
		<p style="text-indent: 1.5em">LAN systems are typically used in
			distributed control systems, DCS, where individual controllers
			control sub processes while a centralized controller controls the
			entire process. Furthermore the LAN system of communication provides
			the communication system needed for a SCADA system, allowing for data
			collection and processing.</p>
		<p style="text-indent: 1.5em">The LAN system can be divided into three
			levels of the communication network: device level, control level, and
			information level. Device level communication is where field devices
			like sensor and solenoids communicate with the controller. Control
			level communication is where master PLCs and HMI communicate with sub
			PLCs. Finally the information level is where SCADA systems
			communicate with master controllers.</p>
		<p style="text-indent: 1.5em">Each device connected to the network is
			referred to as a node or station. These nodes can be connected in two
			different types of configurations: star topology and bus topology. In
			star topology each node is connected to the LAN through a network
			control switch. The switch allows bidirectional communication to each
			node, allowing increased speed, size, and data handling capacity. The
			switch unfortunately is a weak point of the system; if the switch
			fails the entire communication system fails.</p>
	</div>

</div>
@stop @section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
	<p>Finish this section by reading about Bus topology to the right and then choose the 
	correct attributes of data communication to continue.</p>
</div>
@stop 
@section('exercise')
<div class="thumbnail" style="padding: 100 px; width: 900px">
	<div id="m11_ex4_workspace">
		<h3 style="text-align: center">
			Bus Topology
			</h3>
			<br />
			<p style="text-indent: 1.5em">Bus topology uses a main cable known as
				a bus trunk cable. Nodes in this configuration tap into the bus
				through the use of a drop line and tee tap. Each node looks for its
				own identification and only accepts information when its
				identification is flagged. Bus topology allows for easy adding and
				removal of nodes. Damage to the trunk line can cause nodes
				downstream to lose communication.</p>
			<p style="text-indent: 1.5em">Bus topology can be further broken down
				into two categories: device bus networks and process bus network.
				Devices bus networks are setup for the amount of data they need to
				send. Bit-wide busses are used for discrete I/Os that only send
				on/off states. Byte wide busses send words of data, typically
				generated from a set of discrete devices.</p>
			<p style="text-indent: 1.5em">Process bus networks are capable of
				sending hundreds of bytes per transmission. This is ideal for
				process control as more information is needed to be passed from
				controller to controller. This is also ideal for high level analog
				devices such as flowmeters and smart process control valves that
				require large packet sized data.</p>
	
	</div>

	<div id="question1">
		<p>
		
		
		<ol style="list-style-type: upper-alpha">
			<li> Data communication refers how PLCs transfer machine parts<br /> LAN system can be divided into two
			levels of the communication network<br /> Bus topology allows for easy adding and
				removal of nodes
			</li>
			<br />
			<li> Data communication refers how PLCs transfer data<br /> LAN system can be divided into three
			levels of the communication network<br /> Bus topology allows for easy adding and
				removal of nodes
			</li>
			<br />
			<li> Data communication refers how PLCs transfer data<br /> LAN system can be divided into four
			levels of the communication network<br /> Bus topology  does not allow for easy adding and
				removal of nodes
			</li>
			<br />
			<li> Data communication refers how PLCs transfer machine parts<br /> LAN system can be divided into three
			levels of the communication network<br /> Bus topology does not allow for easy adding and
				removal of nodes
			</li>
			<br />
		</ol>
		</p>
		<div class="caption">
			<input type="hidden" name="crypt1" value="1"> <input class="radio"
				type="hidden" name="question1" value="99999">
			<div class="btn-group btn-group-justified">
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-radio" value="0">A</button>
				</div>
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-radio" value="1">B</button>
				</div>
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-radio" value="2">C</button>
				</div>
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-radio" value="3">D</button>
				</div>
			</div>
		</div>
	</div>

</div>
@stop
@section('submit-class')
m11_ex4_submit
@stop

@section('additional_script')
<script>
var answer = 0;

$(document).ready(function() {
	$('.radio').val('9999');
});

$('.btn-radio').click(function() {
	$(this).parent().siblings().children().removeClass('active');
	$(this).addClass('active');
	answer = $(this).attr('value');
	$(this).parent().parent().siblings('.radio').val($(this).attr('value'));
});
$(".m11_ex4_submit").button().click(
		function () {
			var solution = 1;
			if(solution == answer){
				submit_post(1);
			}
			else{
				submit_post(0);
			}
		});
</script>
@stop
