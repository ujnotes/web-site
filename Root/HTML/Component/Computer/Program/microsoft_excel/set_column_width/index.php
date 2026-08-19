<div id='message'>
	<p>
		Sub ColumnWidthInCentimeters().
	</p>
	<p>
		Dim cm As Single, points As Integer, savewidth As Integer.
	</p>
	<p>
		Dim lowerwidth As Integer, upwidth As Integer, curwidth As Integer.
	</p>
	<p>
		Dim Count As Integer.
	</p>
	<p>
		Application.ScreenUpdating = False.
	</p>
	<p>
		Cm = Application.InputBox("Enter Column Width in Centimeters", _.
	</p>
	<p>
		"Column Width (cm)", Type:=1).
	</p>
	<p>
		If cm = False Then Exit Sub.
	</p>
	<p>
		Points = Application.CentimetersToPoints(cm).
	</p>
	<p>
		Savewidth = ActiveCell.ColumnWidth.
	</p>
	<p>
		ActiveCell.ColumnWidth = 255.
	</p>
	<p>
		If points &gt; ActiveCell.Width Then.
	</p>
	<p>
		MsgBox "Width of " &amp; cm &amp; " is too large." &amp; Chr(10) &amp; _.
	</p>
	<p>
		"The maximum value is " &amp; _.
	</p>
	<p>
		Format(ActiveCell.Width / 28.3464566929134, _.
	</p>
	<p>
		"0.00"), vbOKOnly + vbExclamation, "Width Error".
	</p>
	<p>
		ActiveCell.ColumnWidth = savewidth.
	</p>
	<p>
		Exit Sub.
	</p>
	<p>
		End If.
	</p>
	<p>
		Lowerwidth = 0.
	</p>
	<p>
		Upwidth = 255.
	</p>
	<p>
		ActiveCell.ColumnWidth = 127.5.
	</p>
	<p>
		Curwidth = ActiveCell.ColumnWidth.
	</p>
	<p>
		Count = 0.
	</p>
	<pre class='indent-c'><code class='block'>While (ActiveCell.Width &lt;&gt; points) And (Count &lt; 20)</code></pre>
	<p>
		If ActiveCell.Width &lt; points Then.
	</p>
	<p>
		Lowerwidth = curwidth.
	</p>
	<p>
		Selection.ColumnWidth = (curwidth + upwidth) / 2.
	</p>
	<p>
		Else.
	</p>
	<p>
		Upwidth = curwidth.
	</p>
	<p>
		Selection.ColumnWidth = (curwidth + lowerwidth) / 2.
	</p>
	<p>
		End If.
	</p>
	<p>
		Curwidth = ActiveCell.ColumnWidth.
	</p>
	<p>
		Count = Count + 1.
	</p>
	<p>
		Wend.
	</p>
	<p>
		End Sub.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
