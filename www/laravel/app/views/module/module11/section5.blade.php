<style>
#m5_ex1_workspace {
	font: 150% "Trebuchet MS", sans-serif;
	text-align: center
}
</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Networking Schemes') 
@section('section-menu')
@include('module.module11.menu') 
@stop @section('lesson')
<div class="lesson-title">Networking Schemes</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>What are Networking Schemes?</h3>
		<p style="text-indent: 1.5em">Networking schemes replace point to
			point hardwiring in a control network. By networking control
			hardware, field devices, and HMI components instead of point to point
			systems, the amount of wiring is reduced. This reduction in wiring
			allows for quicker install time of the control system and reduced
			troubleshooting times.</p>
		<p style="text-indent: 1.5em">There are several standards of
			networking schemes including: Data Highway, Serial Communication,
			DeviceNet, ControlNet, EtherNet/IP, Modbus, Fieldbus, and Profibus.</p>
		<br />
	</div>
	<div class="subsection">
		<h2>Data Highway</h2>
		<p style="text-indent: 1.5em">The data highway networking scheme
			including Data Highway Plus, DH+, and DH-485 are proprietary
			networking schemes developed by Rockwell Allen-Bradley Company. It
			offers peer to peer communication through a shielded twisted pair
			cable with a three pin Phoenix connector at its termination points.</p>
		<br />
		<h2>Serial Communication</h2>
		<p style="text-indent: 1.5em">Serial Communications follow the
			recommended standards: RS-232, RS-422, and RS-485. This communication
			standard interfaces with the controller’s processor or separate
			communication module. The serial communication scheme allows high
			speed communication up to lengths of 50 feet for the RS-232 cable,
			650 feet for the RS-485, and 1650 feet for the RS-422.</p>
		<br />
		<h2>DeviceNet</h2>
		<p style="text-indent: 1.5em">DeviceNet is an open-level networking
			scheme used primarily for field devices. This scheme replaces wiring
			individual wires to the controller reducing wiring sizes and
			installation time. Through the use of a tee tap, field devices are
			connected to a four wire trunk cable that is connected to the
			controller through a network scanner module. The scanner reads
			inputs, writes outputs, retrieve configuration data and monitors
			status of devices connected to system. The scanner then passes to the
			controller information including: I/O data, status information, and
			configuration data.</p>
		<p style="text-indent: 1.5em">DeviceNet use the object oriented
			protocol CIP, Common Industrial Protocol. Each object has a set of
			attributes, actions, and behavioral properties tied to them. Up to
			sixty four nodes can be connected to one DeviceNet scanner.</p>
		<br />
	</div>

</div>
@stop 
@section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
	<p>Finish this module by reading about the last 5 networking schemes to
		the right and then answering the true or false question and pressing
		'Continue'.</p>
</div>
@stop 
@section('exercise')
<div class="thumbnail" style="padding: 100 px; width: 900px">
	<div id="m11_ex5_workspace">
		<h2>ControlNet</h2>
		<p style="text-indent: 1.5em">ControlNet is another type of
			communication operating under CIP standards. Typically positioned on
			control level above DeviceNet, it provides the functionality of the
			I/O network of DeviceNet and a peer-to-peer network. This combination
			allows for high-speed applications.</p>
		<p style="text-indent: 1.5em">There are two primary characteristics to
			ControlNet: determinism and repeatability. Determinism is the act of
			reliability predicting data flow. Repeatability describes constant
			transmit times and data is unaffected by other devices connected to
			the ControlNet. To accomplish these two traits, ControlNet utilizes
			Electronic Device Datasheets. Devices connected to the network are
			configured by this file.</p>
		<br />
		<h2>EtherNet/IP</h2>
		<p style="text-indent: 1.5em">Ethernet Industrial Protocol is a common
			industrial protocol used in conjuction with DeviceNet and ControlNet.
			This protocol allows for a seamless link in between devices attached
			to the communication network including devices with custom hardware.
			This in turn allows for devices from different manufactures to able
			to communicate together easily, known as “plug and play”.</p>
		<br />
		<h2>Modbus</h2>
		<p style="text-indent: 1.5em">The serial communication, Modbus, was
			developed by the PLC company, Modicon. This open protocol allows
			transfer of data over serial lines. To accomplish this a Modbus
			master is created at the controller or the device receiving incoming
			information. Devices sending data are slaved to the master known as
			Modbus Slaves. Due to the open protocol nature of this protocol,
			Modbus has become an industry standard in industrial
			communication/control.</p>
		<br />
		<h2>Fieldbus</h2>
		<p style="text-indent: 1.5em">Fieldbus is another open, serial,
			two-way communication protocol. In a Fieldbus system, field devices
			and controllers are daisy-chained together meaning the control cable
			is routed from device to device. It is important to note that unless
			proper wiring practices are meant, disconnects in the sytem could
			shut down field devices downstream of the disconnect.</p>
		<br />
		<h2>Profibus-DP</h2>
		<p style="text-indent: 1.5em">Originally developed by Siemens; this
			open, international Fieldbus protocol is an industry standard. Able
			to support analog and discrete devices this communication protocol
			can handle data up to speeds of 12 Mbps and a distance up to 1200
			meters. To achieve this Profibus-DP functions with either the RS-485
			standard or fiber optics.</p>
		<br />

	</div>

	<div id="question1">
		<p>There are 8 types of networking schemes discussed in this section.
		</p>
		<div class="caption">
			<input type="hidden" name="crypt1" value="1"> <input class="radio"
				type="hidden" name="question1" value="99999">
			<div class="btn-group btn-group-justified">
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-radio" value="0">False</button>
				</div>
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-radio" value="1">True</button>
				</div>
			</div>
		</div>
	</div>

</div>
@stop 
@section('submit-class') 
m11_ex5_submit 
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
$(".m11_ex5_submit").button().click(
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
