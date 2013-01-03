

<script type="text/template" id="menus-template" >	
	<div class="row" >
		<div class="span14" id="qbs-menu" >
				<ul class="nav nav-tabs" id="main-tabs" >
					<li class="active" ><a href="#passing-tab" data-toggle="tab" >Passing</a></li>					
					<li><a href="#rushing-tab" data-toggle="tab" >Rushing</a></li>
				</ul>
		</div>
	</div>
</script>

<script type="text/template" id="content-template" >
	<div class="row" >
		<div class="span14 tab-content" id="qbs-content" >
			<div class="tab-pane active" id="passing-tab" >
				<div class="tabbable tabs-left" >
					<ul class="nav nav-tabs" id="passing-menu" >
						<li><a href="#RAT" data-toggle="tab" >Passer Rating</a></li>
						<li><a href="#Completion-Percentage" data-toggle="tab" >Completion Percentage</a></li>
						<li><a href="#Passing-Yards" data-toggle="tab" >Yards</a></li>
						<li><a href="#Passing-TD" data-toggle="tab" >Touchdowns</a></li>
						<li><a href="#INT" data-toggle="tab" >Interceptions</a></li>
						<li><a href="#Passing-Completions" data-toggle="tab" >Completions</a></li> 
						<li><a href="#Passing-Attempts" data-toggle="tab" >Attempts</a></li>   
						<li><a href="#Longest-Pass" data-toggle="tab" >Longest Pass</a></li> 
					</ul>
					<div class="tab-content charts" id="passing-graphs" >
						<div class="tab-pane fade chart" id="RAT" ></div>
						<div class="tab-pane fade chart" id="Completion-Percentage" ></div>
						<div class="tab-pane fade chart" id="Passing-Yards" ></div>
						<div class="tab-pane fade chart" id="Passing-TD" ></div>
						<div class="tab-pane fade chart" id="INT" ></div>
						<div class="tab-pane fade chart" id="Passing-Completions" ></div>
						<div class="tab-pane fade chart" id="Passing-Attempts" ></div>
						<div class="tab-pane fade chart" id="Longest-Pass" ></div>
					</div>
                </div>
			</div>
			<div class="tab-pane" id="rushing-tab" >
				<div class="tabbable tabs-left" >
					<ul class="nav nav-tabs" id="rushing-menu" >
						<li><a href="#Rushing-Yards" data-toggle="tab" >Yards</a></li>
						<li><a href="#Rushing-Average" data-toggle="tab" >Average</a></li>
						<li><a href="#Rushing-TD" data-toggle="tab" >Touchdowns</a></li>
						<li><a href="#Rushing-Attempts" data-toggle="tab" >Attempts</a></li>
						<li><a href="#Longest-Rush" data-toggle="tab" >Longest Rush</a></li>
					</ul>
					<div class="tab-content charts" id="rushing-graphs" >
						<div class="tab-pane fade chart" id="Rushing-Yards" ></div>
						<div class="tab-pane fade chart" id="Rushing-Average" ></div>
						<div class="tab-pane fade chart" id="Rushing-TD" ></div>
						<div class="tab-pane fade chart" id="Rushing-Attempts" ></div>
						<div class="tab-pane fade chart" id="Longest-Rush" ></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

