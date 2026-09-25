<div id='message'>
		<?php $alt='Omarchy: Arch-based desktop used as a local AI and app-test box.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What this note covers</h3>
	<p>
		Omarchy is an Arch-based desktop environment useful as a local AI and app-test box. These notes are generic setup learnings — not a machine inventory.
	</p>
	<h3>Local AI on Omarchy (Polaris-era AMD)</h3>
	<p>
		Omarchy ships first-party Ollama packages. On AMD Polaris GPUs (RX 400/500), prefer the <strong>Vulkan</strong> build (<code class='inline'>ollama-vulkan</code>) over ROCm: ROCm often does not support Polaris, while RADV Vulkan does.
	</p>
	<p>
		On very old CPUs without AVX, treat GPU offload as required for usable local LLMs; CPU-only modern builds are a poor fit.
	</p>
	<p>
		Start with a small quantized model (~3B) when system RAM is ~8 GiB even if VRAM is 8 GiB.
	</p>
	<p>
		Enable the systemd unit and use the OpenAI-compatible HTTP API on <code class='inline'>127.0.0.1:11434</code> for app integration; non-interactive <code class='inline'>ollama run</code> can hang without a TTY.
	</p>
	<h3>Reaching Windows Caddy *.local sites from Linux</h3>
	<p>
		<code class='inline'>.local</code> is reserved for mDNS. If <code class='inline'>nsswitch.conf</code> lists <code class='inline'>mdns_minimal [NOTFOUND=return]</code> before <code class='inline'>files</code>, entries in <code class='inline'>/etc/hosts</code> for <code class='inline'>something.local</code> will never apply. Put <code class='inline'>files</code> first (or avoid <code class='inline'>.local</code> and use <code class='inline'>.lan</code> / <code class='inline'>.test</code>).
	</p>
	<p>
		When Caddy runs as a Windows service (LocalSystem), its internal CA root lives in the <strong>service</strong> data directory — not the interactive user’s <code class='inline'>AppData\Roaming\Caddy</code> tree. Trusting the user-profile <code class='inline'>root.crt</code> can look correct (same CN) but still fail TLS verify. Fetch the live root from the Caddy admin API (<code class='inline'>/pki/ca/local</code>) or the SYSTEM profile PKI, then <code class='inline'>trust anchor</code> + <code class='inline'>update-ca-trust</code> on Arch/Omarchy.
	</p>
	<p>
		HTTPS-only local stacks (no port 80) will time out on plain HTTP even when DNS/hosts and ping succeed.
	</p>
<p>
		USB Wi-Fi soft hangs under load on older EHCI hosts are a hardware/driver issue (rtw88), not Omarchy-specific — see <a class="content-link XURL" href="/technology/computer/issues/usb_wifi_soft_hang/nix/omarchy" data-target="technology/computer/issues/usb_wifi_soft_hang/nix/omarchy" data-title="USB Wi-Fi soft hang (Omarchy notes)">USB Wi-Fi soft hang (Omarchy notes)</a>.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>