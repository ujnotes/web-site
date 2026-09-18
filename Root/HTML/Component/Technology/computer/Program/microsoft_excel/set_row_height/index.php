<div id='message'>
	<p>
		Cell height cannot be resized via GUI.
	</p>
	<h2>following Macro must be used</h2>
	<p>
		Sub SetRowHeightInCentimeters().
	</p>
	<p>
		Dim cm As Single.
	</p>
	<p>
		Cm = Application.InputBox("Enter Row Height in Centimeters", _.
	</p>
	<p>
		"Row Height (cm)", Type:=1).
	</p>
	<p>
		If cm Then.
	</p>
	<p>
		Selection.RowHeight = Application.CentimetersToPoints(cm).
	</p>
	<p>
		End If.
	</p>
	<p>
		End Sub.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
