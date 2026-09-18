<div id='message'>
	<p>
		<code class='inline'>$acl</code> must be changed to be applicable. Get the ACL from <code class='inline'>hkcu:\software\foo</code>, take its access rules as <code class='inline'>NTAccount</code>, remove and re-add the first rule, then apply the ACL to <code class='inline'>hkcu:\software\bar</code>.
	</p>
	<pre class='indent-c'><code class='block'>$acl = get-acl -path hkcu:\software\foo
$r = $acl.GetAccessRules( $true, $true, [security.principal.ntaccount] )
$acl.RemoveAccessRuleAll( $r[0] )
$acl.AddAccessRule( $r[0] )
set-acl -path hkcu:\software\bar -aclobject $acl</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
