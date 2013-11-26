<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>
        
	<div id="body">
                <p><strong>Controller</strong> - <em>application/controllers/welcome.php</em></p>
                <p><strong>View</strong> - <em>application/views/welcome_message.php:</em></p>
                <h2>Sample variables</h2>
                </p>
                <strong>Controller:</strong>
                <code>
                    &lt;?php<br />
                    public function index()<br />
                    {<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$data = array('sample_var' => 'SAMPLE VAR');<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$this->template->parse_view('welcome_message.php', $data);<br />
                    }
                </code>
                <strong>View:</strong>
                <code>
                    &#123;&#123;sample_var&#125;&#125;
                </code>
                <b>Output:</b><br />
                <code>
                {{sample_var}}
                </code>
                <h2>Boolean variables</h2>
                <p></p>
                <strong>Controller:</strong>
                <code>
                    &lt;?php<br />
                    public function index()<br />
                    {<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$data = array('true_var' => true);<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$this->template->parse_view('welcome_message.php', $data);<br />
                    }
                </code>
                <strong>View:</strong>
                <code>
                    &#40;&#40;ture_var&#41;&#41;You can see this text, because ture_var set in TRUE &#40;&#40;/ture_var&#41;&#41;<br />
                    &#40;&#40;!ture_var&#41;&#41;And you can't see this text, because ture_var not equal to FALSE&#40;&#40;/ture_var&#41;&#41;
                </code>
                <b>Output:</b><br />
                <code>
                ((true_var))You can see this text, because ture_var set in TRUE!((/true_var))<br />
                ((!true_var))And you can't see this text, because ture_var not equal to FALSE((/true_var))
                </code>
                <h2>Arrays</h2>
                <p></p>
                <strong>Controller:</strong>
                <code>
                    &lt;?php<br />
                    public function index()<br />
                    {<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$data = array();<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$data['list'][] = array('name' => 'John', 'age' => 41);<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$data['list'][] = array('name' => 'Andy', 'age' => 17);<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$data['list'][] = array('name' => 'Dany', 'age' => 28);<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;$this->template->parse_view('welcome_message.php', $data);<br />
                    }
                </code>
                <strong>View:</strong>
                <code>
                    &#91;&#91;list&#93;&#93<br />
                    &nbsp;&nbsp;&lt;p&gt;NAME: &#123;&#123;list.name&#125;&#125;, AGE: &#123;&#123;list.age&#125;&#125;&lt;/p&gt;<br />
                    &#91;&#91;/list&#93;&#93;;
                </code>
                <b>Output:</b><br />
                <code>
                [[list]]
                    <p>NAME: {{list.name}}, AGE: {{list.age}}</p>
                [[/list]]
                </code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</div>

</body>
</html>