<style>
	.s-title h2{
		margin-right:35px;
	}
	#letters a{padding-left:0;}
	/*类似橙色的颜色*/
	body .color_orange{
		color:#ff6000;
	}
</style>
<div class="content lay-out">
	<div class="left-box">
		<div class="bottom-border">
			<div class="new-game rBox">
				<div class="tips aBox"></div>
				
				<div class="s-title">
					<a href="#">
						<h2 class="fl color_orange">全部游戏</h2>
					</a>
					<a href="#">
						<h2 class="fl">手机游戏</h2>
					</a>
					<a href="#">
						<h2 class="fl">网页游戏</h2>
					</a>
					<a href="#">
						<h2 class="fl">客户端游戏</h2>
					</a>
				</div>
				<div class="box">
					<div class="list">
						[n:newgame]	
						<dl class="">
							<dt><a href="$url"><img src="$img" alt="$name">$name</a></dt>
							<dd>
								<p>类型：<a href="#">$type</a></p>
								<p>画面：<a href="#">$ui</a></p>
								<p>题材：<a href="#">$theme</a></p>
								<p>状态：<a href="#">$zhuangtai</a></p>
							</dd>
						</dl>
						[/n:newgame]	
					</div>
				</div>
			</div>
		</div>
		
		<div class="bottom-border">
			<div class="quick-block mt_15">
				<dl class="s-type">
					<dt>按游戏<b>类型</b>查找：</dt>
					<dd>
						<ul>
							<li class="hover"><a href="#" onclick="setLetter(false,&#39;0&#39;);return false;">全部</a></li>
								<li><a href="#" onclick="setLetter(false,&#39;1&#39;);return false;">手机游戏</a></li>
								<li><a href="#" onclick="setLetter(false,&#39;2&#39;);return false;">网页游戏</a></li>
								<li><a href="#" onclick="setLetter(false,&#39;3&#39;);return false;">客户端游戏</a></li>
								
							</ul>
					</dd>
				</dl>
				<dl class="letter">
					<dt>按游戏<b>字母</b>查找：</dt>
					<dd>	
					
						<ul id="letters">
							<li class="hover"><a href="#" onclick="setLetter(&#39;0&#39;,false);return false;">全部</a></li>
							<li><a href="#" onclick="setLetter(&#39;A&#39;,false);return false;">A</a></li>
							<li><a href="#" onclick="setLetter(&#39;B&#39;,false);return false;">B</a></li>
							<li><a href="#" onclick="setLetter(&#39;C&#39;,false);return false;">C</a></li>
							<li><a href="#" onclick="setLetter(&#39;D&#39;,false);return false;">D</a></li>
							<li><a href="#" onclick="setLetter(&#39;E&#39;,false);return false;">E</a></li>
							<li><a href="#" onclick="setLetter(&#39;F&#39;,false);return false;">F</a></li>
							<li><a href="#" onclick="setLetter(&#39;G&#39;,false);return false;">G</a></li>
							<li><a href="#" onclick="setLetter(&#39;H&#39;,false);return false;">H</a></li>
							<li><a href="#" onclick="setLetter(&#39;I&#39;,false);return false;">I</a></li>
							<li><a href="#" onclick="setLetter(&#39;J&#39;,false);return false;">J</a></li>
							<li><a href="#" onclick="setLetter(&#39;K&#39;,false);return false;">K</a></li>
							<li><a href="#" onclick="setLetter(&#39;L&#39;,false);return false;">L</a></li>
							<li><a href="#" onclick="setLetter(&#39;M&#39;,false);return false;">M</a></li>
							<li><a href="#" onclick="setLetter(&#39;N&#39;,false);return false;">N</a></li>
							<li><a href="#" onclick="setLetter(&#39;O&#39;,false);return false;">O</a></li>
							<li><a href="#" onclick="setLetter(&#39;P&#39;,false);return false;">P</a></li>
							<li><a href="#" onclick="setLetter(&#39;Q&#39;,false);return false;">Q</a></li>
							<li><a href="#" onclick="setLetter(&#39;R&#39;,false);return false;">R</a></li>
							<li><a href="#" onclick="setLetter(&#39;S&#39;,false);return false;">S</a></li>
							<li><a href="#" onclick="setLetter(&#39;T&#39;,false);return false;">T</a></li>
							<li><a href="#" onclick="setLetter(&#39;U&#39;,false);return false;">U</a></li>
							<li><a href="#" onclick="setLetter(&#39;V&#39;,false);return false;">V</a></li>
							<li><a href="#" onclick="setLetter(&#39;W&#39;,false);return false;">W</a></li>
							<li><a href="#" onclick="setLetter(&#39;X&#39;,false);return false;">X</a></li>
							<li><a href="#" onclick="setLetter(&#39;Y&#39;,false);return false;">Y</a></li>
							<li><a href="#" onclick="setLetter(&#39;Z&#39;,false);return false;">Z</a></li>
							<li><a href="#" onclick="setLetter(&#39;Z&#39;,false);return false;">0-9</a></li>
						</ul>
					</dd>
				</dl>
				<dl>
					<dt>按游戏<b>类型</b>查找：</dt>
					<dd>
						<ul>
							<li class="hover"><a href="#" onclick="setLetter(false,&#39;0&#39;);return false;">全部</a></li>
							<li><a href="#" onclick="setLetter(false,&#39;1&#39;);return false;">战争策略</a></li>
							<li><a href="#" onclick="setLetter(false,&#39;2&#39;);return false;">角色扮演</a></li>
							<li><a href="#" onclick="setLetter(false,&#39;3&#39;);return false;">模拟经营</a></li>
							<li><a href="#" onclick="setLetter(false,&#39;4&#39;);return false;">社区养成</a></li>
							<li><a href="#" onclick="setLetter(false,&#39;5&#39;);return false;">休闲竞技</a></li>
						</ul>
					</dd>
				</dl>
			</div>
		</div>
		<div class="game-list mt_15">
			<div class="box ">
				
						
				[n:recogame]	
				<dl>
					<div class="clearfix">
						<dt>
							<a target="_blank" href="$url"><img src="$img" alt="$name"></a>
						</dt>
						<dd>
							<h3><a target="_blank" href="#">$name</a></h3>
							<p>
								<span class="g-span1 block fl">
									类型：<a href="#">$type</a>
								</span>
								<span class="g-span2">
									评分：<a href="#">$grade</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									画面：<a href="#">$ui</a>
								</span>
								<span class="g-span2">
									题材：<a href="#">$theme</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									战斗：<a href="#">$combat</a>
								</span>
								<span class="g-span2">
									状态：<a href="#">$state</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									开发：<a href="#">$develop</a>
								</span>
								<span class="g-span2">
									运营：<a href="#">$run</a>
								</span>
							</p>
						
						</dd>
					</div>
					
					<div class="g-action">
						<a class="play_btn fl ml5" href="#">官方网站</a>
						<a class="play_btn2 fl ml10 mr5" href="#">礼包</a>
						<a class="g-info fl ml15" href="#">新闻(0)</a>
						<a class="g-info fl ml10" href="#">攻略(0)</a>
						<a class="g-info fl ml10" href="#">图片(0)</a>
						<a class="g-info fl ml10" href="#">视频(0)</a>
						
					</div>
				</dl>
				[/n:recogame]	
			</div>
			<div class="pagination">
				<li class="previous_page disabled"><a href="#">« 上一页</a></li>
				<li class="active"><a href="#">1</a></li>
				<li ><a href="#">2</a></li>
				<li ><a href="#">3</a></li>
				<li ><a href="#">4</a></li>
				<li ><a href="#">5</a></li>
				<li ><a href="#">6</a></li>
				<li class="next_page"><a href="#">下一页 »</a></li>
			</div>
		</div>
			

	</div>

	<div class="right-box">
		<div class="click-rank rBox">
			<div class="tips aBox"></div>
			<div class="border-box">
				<div class="t-title">
					<h2>热门游戏排行榜</h2>
				</div>
			
				<div class="box">
					<dl>
						<dt class="t-type">
							<a class="mr10 color_orange" href="#">全部</a>
							<a class="mr10" href="#">手游</a>
							<a class="mr15" href="#">页游</a>
							<a class="" href="#">端游</a>
						</dt>
					</dl>
					<dl>
						<dt>
							<span class="right">131191</span>
							<span class="num top">1</span>
							<a href="#">烈火战神</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">武侠</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>
							<span class="right">90241</span>
							<span class="num top">2</span>
							<a href="#">武尊</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">奇幻</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">52048</span>
							<span class="num top">3</span>
							<a href="#">武易</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">其它</a></span>
								<span>状态：<a href="#">公测</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">79381</span>
							<span class="num">4</span>
							<a href="#">烈焰</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">其它</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">65566</span>
							<span class="num">5</span>
							<a href="#">街机三国</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">三国</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">47643</span>
							<span class="num">6</span>
							<a href="#">大侠传</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">其它</a></span>
							</p>
							<p>
								<span>题材：<a href="#">武侠</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">43469</span>
							<span class="num">7</span>
							<a href="#">热血海贼王</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">其它</a></span>
							</p>
							<p>
								<span>题材：<a href="#">其它</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">42077</span>
							<span class="num">8</span>
							<a href="#">神将三国</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">三国</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
										<dl>
						<dt>
							<span class="right">39457</span>
							<span class="num">9</span>
							<a href="#">古剑奇侠</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">仙侠</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>
							<span class="right">38247</span>
							<span class="num">10</span>
							<a href="#">醉西游</a>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">奇幻</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="click-rank rBox mt10">
			<div class="tips aBox"></div>
			<div class="border-box">
				<div class="t-title">
					<h2>热门游戏测试表</h2>
				</div>
			
				<div class="box">
					<dl>
						<dt class="t-type">
							<a class="mr10 color_orange" href="#">全部</a>
							<a class="mr10" href="#">手游</a>
							<a class="mr15" href="#">页游</a>
							<a class="" href="#">端游</a>
						</dt>
					</dl>
					<dl>
						<dt>
							<table>
								<tr>
									<th>游戏名称</th>
									<th class="tc">测试时间</th>
									<th class="tr last">状态</th>
								</tr>
							</table>
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">武侠</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>
							<table>
								<tr>
									<td>
										<a href="#">烈火战神</a>
									</td>
									<td class="tc">09:00</td>
									<td class="tr color_orange last">公测</td>
								</tr>
							</table>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a href="#">角色扮演</a></span>
								<span>画面：<a href="#">2D</a></span>
							</p>
							<p>
								<span>题材：<a href="#">武侠</a></span>
								<span>状态：<a href="#">运营</a></span>
							</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	
	</div>

	
</div>
