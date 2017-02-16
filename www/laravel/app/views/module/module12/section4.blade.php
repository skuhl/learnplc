<style>
    #m12_ex4_workspace {
        /*font: 62.5% "Trebuchet MS", sans-serif;*/
        padding: 0px;
    }

    #m12_ex4_namelist .ui-accordion-content {
        padding: 0px;
    }
</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Backwash')

@section('section-menu')
    @include('module.module12.menu')
@stop

@section('lesson')
    <div class="lesson-title">Backwash</div>
    <div class="lesson-statement">
        <div class="subsection">
            <h3>Backwash Purpose</h3>
            <p>When a filter tank becomes clogged, the outflow pressure becomes low or there is a large difference
                between
                inflow and outflow pressure and a backwash must be performed. The inlet flow must be stopped and the
                dirty water
                drain opened. Clean water is pumped backwards through the tank and the filter medium is agitated such
                that the
                system becomes unclogged. Then the dirty water is pumped through the wash troughs and is drained through
                the
                dirty water drain. After the backwards is performed, the filter tank can resume water cleaning.</p>
        </div>
        <div class="subsection">
            <h3>Steps for Basckwash</h3>
            <p>
            <ol>
                <li> Check for low outflow pressure or large pressure difference</li>
                <li> Turn off inlet pump</li>
                <li> Close inlet valve</li>
                <li> Open dirty water drain valve</li>
                <li> Turn on backwash pump</li>
                <li> Turn on surface wash pump</li>
                <li> Open surface wash valve</li>
                <li> Wash until a preset amount of water has been pumped through<br/>
                    At this point it is time to end the backwash and resume cleaning water
                </li>
                <li> Shutdown surface wash pump</li>
                <li> Close surface wash valve</li>
                <li> Shutdown backwash pump</li>
                <li> Close dirty water drain valve</li>
                <li> Open inflow valve</li>
                <li> Start inflow pump</li>
                <li> Monitor for correct outflow pressure</li>
            </ol>
            </p>
        </div>
        <div class="subsection">
            <h3>Backwash Diagrams</h3>
            <h4>Filter Medium is Clogged</h4>
            <p>
                {{ HTML::image('public/assets/img/module12/section4_diagram1.png','section4_diagram1', array('width'=>'600', 'height'=>'400')) }}
            </p>
            <h4>Begin Backwash</h4>
            <p>
                {{ HTML::image('public/assets/img/module12/section4_diagram2.png','section4_diagram2', array('width'=>'600', 'height'=>'400')) }}
            </p>
            <h4>Backwash is Complete</h4>
            <p>
                {{ HTML::image('public/assets/img/module12/section4_diagram3.png','section4_diagram3', array('width'=>'600', 'height'=>'400')) }}
            </p>
            <h4>Resume Cleaning Water</h4>
            <p>
                {{ HTML::image('public/assets/img/module12/section4_diagram4.png','section4_diagram3', array('width'=>'600', 'height'=>'400')) }}
            </p>
            <p>
                A working pump should read with a gallons per minute intake of 10 to
                10,000 GPM and a water pressure between 50 and 100 PSI.<br/>
            </p>
        </div>
    </div>
@stop
@section('instructions')
    <div class="lesson-title">Exercise 4</div>
    <div class="lesson-statement">
        <p>Choose the correct scenario that needs a filter tank backwash.</p>
    </div>
@stop
@section('exercise')
    <div class='row'>
        <div class="thumbnail" style="padding: 10 px; width: 80%">
            <div id="m12_ex4_workspace" style="padding: 0px">
                <div id="question1">
                    <p>
                        &ensp; &ensp; &ensp; Question. - In which scenario do we have to perform a BACKWASH in order to maintain normal system operation? (Please select the correct one and click the submit button)<br><br>
                    </p>

                    <p>
                    <ol style="list-style-type: upper-alpha">
                        <li> System main water pressure exceeding limits.
                        </li>
                        <br/>
                        <li> System main water pressure below limits.
                        </li>
                        <br/>
                        <li> Outflow pressure exceeding limits.
                        </li>
                        <br/>
                        <li> Difference between inflow and outflow pressure becomes equal or greater than a desired set point.
                        </li>
                        <br/>
                    </ol>
                    </p>
                    <div class="caption">
                        <input type="hidden" name="crypt1" value="1">
                        <input class="radio" type="hidden" name="question1" value="99999">
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
        </div>
    </div>
@stop

@section('submit-class')
    m12_ex4_submit
@stop

@section('additional_script')
    <script>
        /**
         * Created by Bochao on 2014/6/25.
         */
        $(document).ready(function () {
            $('.radio').val('9999');
            $('.exercise-pane.center-content').css({margin:'1%'});
        });

        $('.btn-radio').click(function () {
            $(this).parent().siblings().children().removeClass('active');
            $(this).addClass('active');
            answer = $(this).attr('value');
            $(this).parent().parent().siblings('.radio').val($(this).attr('value'));
        });
        $(".m12_ex4_submit").button().click(
                function () {
                    var solution = 3;
                    if (solution == answer) {
                        submit_post(1);
                    }
                    else {
                        submit_post(0);
                    }
                });

    </script>
@stop