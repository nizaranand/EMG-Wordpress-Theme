

<script type="text/template" id="menus-template" >	
	<div class="row" >
		<div class="span14" id="qbs-menu" >
				<ul class="nav nav-tabs" id="main-tabs" >
					<li><a href="#passing-tab" >Passing</a></li>					
					<li><a href="#rushing-tab" >Rushing</a></li>
				</ul>
		</div>
	</div>
</script>

<script type="text/template" id="content-template" >
	<div class="row" >
		<div class="span14 tab-content" id="qbs-content" >
			<div class="tab-pane" id="passing-tab" >
				<div class="row" >
					<ul class="nav nav-tabs" id="passing-menu" >
						<li><a href="#RAT" >Passer Rating</a></li>
						<li><a href="#Completion-Percentage" >Completion Percentage</a></li>
						<li><a href="#Passing-Yards" >Yards</a></li>
						<li><a href="#Passing-TD" >Touchdowns</a></li>
						<li><a href="#INT" >Interceptions</a></li>
					</ul>
				</div>
				<div class="row" >
					<div class="tab-content" id="passing-graphs" >
						<div class="tab-pane span12 offset1" id="RAT" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></svg></div>
						<div class="tab-pane span12 offset1" id="Completion-Percentage" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
						<div class="tab-pane span12 offset1" id="Passing-Yards" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
						<div class="tab-pane span12 offset1" id="Passing-TD" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
						<div class="tab-pane span12 offset1" id="INT" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="rushing-tab" >
				<div class="row" >
					<ul class="nav nav-tabs" id="rushing-menu" >
						<li><a href="#Rushing-Yards" >Yards</a></li>
						<li><a href="#Rushing-Average" >Average</a></li>
						<li><a href="#Rushing-TD" >Touchdowns</a></li>
					</ul>
				</div>
				<div class="row" >
					<div class="tab-content" id="rushing-graphs" >
						<div class="tab-pane span12 offset1" id="Rushing-Yards" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
						<div class="tab-pane span12 offset1" id="Rushing-Average" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
						<div class="tab-pane span12 offset1" id="Rushing-TD" ><svg xmlns="http://www.w3.org/2000/svg" version="1.1"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

