@extends('layout')
@section('title')
说明 | AT.field 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@section('content')
<?php switch($type){?>
<?php case 1:?>
<div class='col-md-2'>
		<ul class="list-group">
				<li class="list-group-item disabled"><a href='/any/1'>关于网站</a></li>
				<li class="list-group-item"><a href='/any/2'>用户须知</a></li>
				<li class="list-group-item"><a href='/any/3'>版权申明</a></li>
				<li class="list-group-item"><a href='/any/4'>广告投放</a></li>
				<li class="list-group-item"><a href='/any/5'>联系我们</a></li>
		</ul>
</div>
<div class='col-md-10'>
</div>
<?php break;?>
<?php case 2:?>
<div class='col-md-2'>
		<ul class="list-group">
				<li class="list-group-item"><a href='/any/1'>关于网站</a></li>
				<li class="list-group-item disabled"><a href='/any/2'>用户须知</a></li>
				<li class="list-group-item"><a href='/any/3'>版权申明</a></li>
				<li class="list-group-item"><a href='/any/4'>广告投放</a></li>
				<li class="list-group-item"><a href='/any/5'>联系我们</a></li>

		</ul>
</div>
<div class='col-md-10'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<span class='panel-title'>用户须知</span>
				</div>
				<div class='panel-body'>
						<h3>一、遵守中华人民共和国有关法律、法规，承担一切因您的行为而直接或间接引起的法律责任。</h3>
						<h3>二、在本站发表言论请注意以下几条规定，若有违反，本坛有权删除。</h3>
						<ul>
								<li>1 、反对国家宪法所确定的基本原则的；</li>
								<li>2 、危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</li>
								<li>3 、损害国家荣誉和利益的；</li>
								<li>4 、煽动民族仇恨、民族歧视，破坏民族团结的；</li>
								<li>5 、破坏国家宗教政策，宣扬邪教和封建迷信的；</li>
								<li>6 、散布谣言，扰乱社会秩序，破坏社会稳定的；</li>
								<li>7 、散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；</li>
								<li>8 、侮辱或者诽谤他人，侵害他人合法权益的；</li>
								<li>9 、含有法律、行政法规禁止的其他内容的；</li>
								<li>10、请勿张贴未经公开报道、未经证实的消息；亲身经历者请注明；</li>
								<li>11、请勿张贴宣扬种族歧视、破坏民族团结的言论和消息；</li>
								<li>12、请注意使用文明用语，任何人不得以任何原因对任何一位网友进行人身攻击、谩骂、诋毁的言论；</li>
								<li>13、未经本站同意，请勿张贴任何形式的广告；</li>
						</ul>
						<h3>三、ID注册和使用昵称注意事项：</h3>
						<ul>
								<li>1、请勿以党和国家领导人或其他名人的真实姓名、字、号、艺名、笔名注册和使用昵称；</li>
								<li>2、请勿以国家组织机构或其他组织机构的名称注册和使用昵称；</li>
								<li>3、请勿注册和使用与其他网友相同、相仿的名字或昵称；</li>
								<li>4、请勿注册和使用不文明、不健康的ID和昵称；</li>
								<li>5、请勿注册和使用易产生歧义、引起他人误解的ID和昵称。</li>
						</ul>
						<h3>四、签名档填写注意事项：</h3>
						<ul>
								<li>1、签名档内容规定与上贴规定一致，要积极健康；</li>
								<li>2、签名档中不能超链接其他网站、文章和音乐；</li>
								<li>3、为方便阅读，请尽量使签名档不超过4行。</li>
						</ul>
						<h3>五、请注意版权问题：</h3>
						<ul>
								<li>1、凡转贴文章，请注明原始出处和时间，否则本站有权删除；</li>
								<li>2、转贴文章时请注意原发表单位的版权声明，并负担由此可能产生的版权责任；</li>
								<li>3、您在本站上发表的文字，本站有权转载或引用；</li>
								<li>4、您注册了AT.Field帐号，即表明您已阅读并接受了上述各项条款；</li>
								<li>5、本站拥有管理页面和ID及昵称的一切权力，请网友服从本站管理，如对管理有意见请用发邮件向论坛管理员（admin@atfield.club）反映。</li>
						</ul>
				</div>
		</div>
</div>
<?php break;?>
<?php case 3:?>
<div class='col-md-2'>
		<ul class="list-group">
				<li class="list-group-item"><a href='/any/1'>关于网站</a></li>
				<li class="list-group-item"><a href='/any/2'>用户须知</a></li>
				<li class="list-group-item disabled"><a href='/any/3'>版权申明</a></li>
				<li class="list-group-item"><a href='/any/4'>广告投放</a></li>
				<li class="list-group-item"><a href='/any/5'>联系我们</a></li>
		</ul>
</div>
<div class='col-md-10'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<span class='panel-title'>版权申明</span>
				</div>
				<div class='panel-body'>
						<ul>
								<li>
								1、本网所有内容，凡注明"A.T Field原创或绝对领域交流网原创"的所有文字、图片和音视频资料，版权均属AT.Field club所有，任何媒体、网站或个人未经本网协议授权不得转载、链接、转贴或以其他方式复制发布/发表。已经本网协议授权的媒体、网站，在下载使用时必须注明"稿件来源：AT.Field club"，违者本网将依法追究责任。
								</li>
								<li>
								2、AT.Field club对其发行的或与合作公司共同发行的包括但不限于产品或服务的全部内容及AT.Field club网站上的材料拥有版权等知识产权，受法律保护。
								</li>
								<li>
								3、未经本网站书面许可，任何单位及个人不得以任何方式或理由对上述产品、服务、信息、材料的任何部分进行使用、复制、修改、抄录、传播或与其它产品捆绑使用、销售。 凡侵犯本站版权等知识产权的，本站必依法追究其法律责任。
								</li>
								<li>
								4、本网站所有内容，如未注明"来源：xxx"的所有文字、图片和音视频，均来源于互联网，如不慎侵害的您的相关权益，请发送邮件至<a href='mailto:admin@atfield.club'>admin@atfield.club</a>，我们将尽快与您联系并进行处理。谢谢！ 
								</li>
								<li>
								5、任何人因使用本网站而可能遭致的意外及其造成的损失（包括因下载本网站可能链接的第三方网站内容而感染电脑病毒），我们对此概不负责，亦不承担任何法律责任。
								</li>
								<li>
								6、本网站禁止制作、复制、发布、传播等具有反动、色情、暴力、淫秽等内容的信息，一经发现，立即删除。若您因此触犯法律，我们对此不承担任何法律责任。
								</li>
								<li>
								7、本网站会员自行上传或通过网络收集的资源，我们仅提供一个展示、交流的平台，不对其内容的准确性、真实性、正当性、合法性负责，也不承担任何法律责任。
								</li>
								<li>
								8、任何单位或个人认为通过本网站网页内容可能涉嫌侵犯其著作权，应该及时向我们提出书面权利通知，并提供身份证明、权属证明及详细侵权情况证明。我们收到上述法律文件后，将会依法尽快处理。
								</li>
						</ul>
				</div>
		</div>
</div>
<?php break;?>
<?php case 4:?>
<div class='col-md-2'>
		<ul class="list-group">
				<li class="list-group-item"><a href='/any/1'>关于网站</a></li>
				<li class="list-group-item"><a href='/any/2'>用户须知</a></li>
				<li class="list-group-item"><a href='/any/3'>版权申明</a></li>
				<li class="list-group-item disabled"><a href='/any/4'>广告投放</a></li>
				<li class="list-group-item"><a href='/any/5'>联系我们</a></li>
		</ul>
		<div class='col-md-10'>
		</div>
</div>

<?php break;?>
<?php case 5:?>
<div class='col-md-2'>
		<ul class="list-group">
				<li class="list-group-item"><a href='/any/1'>关于网站</a></li>
				<li class="list-group-item"><a href='/any/2'>用户须知</a></li>
				<li class="list-group-item"><a href='/any/3'>版权申明</a></li>
				<li class="list-group-item"><a href='/any/4'>广告投放</a></li>
				<li class="list-group-item disabled"><a href='/any/5'>联系我们</a></li>
		</ul>
		<div class='col-md-10'>
		</div>
</div>
<?php break;?>
<?php }?>
@endsection
