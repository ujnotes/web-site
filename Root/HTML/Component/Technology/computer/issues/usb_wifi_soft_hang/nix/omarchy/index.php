<div id='message'>
		<?php $alt='USB Wi-Fi dongle soft-hanging under load on an older EHCI host.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>Hardware context</h3>
	<ul class="list-bullet content-list">
		<li><div>Older AMD AM3 board with AMD SB7x0 EHCI USB 2.0 host (example: Gigabyte GA-78LMT-S2P, Award BIOS).</div></li>
		<li><div>USB Wi-Fi dongle: TP-Link Archer T3U (Realtek RTL8812BU), Linux driver stack <code class='inline'>rtw88_8822bu</code> / <code class='inline'>rtw88_usb</code> / <code class='inline'>rtw88_core</code>.</div></li>
		<li><div>Dongle on a <strong>rear USB 2.0</strong> port (EHCI), not USB 3.</div></li>
	</ul>
	<h3>Symptoms</h3>
	<ul class="list-bullet content-list">
		<li><div>Under <strong>high sustained Wi-Fi throughput</strong> (e.g. ~650 Mbit/s on 5 GHz VHT80), the network drops.</div></li>
		<li><div>Dongle <strong>LED sometimes stays on</strong> (still powered).</div></li>
		<li><div>Machine otherwise keeps running (desktop, other services, GPU workloads continue) — not a full reboot or hard lock.</div></li>
		<li><div>Kernel log pattern (soft hang): <code class='inline'>rtw88</code> / USB: <code class='inline'>read/write register … failed with -110</code> (ETIMEDOUT), sometimes earlier <code class='inline'>-71</code> / disconnect + re-enum. Not primarily IQK-watchdog in the failure we captured.</div></li>
		<li><div>In other case - contrast <strong>hard hang</strong>: LED goes <strong>dark</strong>, no VBUS — physical reseat / power-cycle only; software recover does not help.</div></li>
	</ul>
	<h3>Things tried that did not fix the soft hang</h3>
	<p>
		These were still useful hygiene, but <strong>high-speed soft hangs continued</strong> afterward:
	</p>
	<ol class="list-bullet content-list">
		<li><div><strong>BIOS / platform cleanup (Award-era board)</strong>: ErP Support → Disabled; USB Wake Up from S3 → Disabled; prefer rear USB 2.0; keep USB Legacy Function Enabled so a USB keyboard works in Setup;</div></li>
		<li><div><strong>Assuming it was a full system crash</strong> — logs showed Wi-Fi/USB path only.</div></li>
		<li><div>A <code class='inline'>usbcore.autosuspend=-1</code> line in <code class='inline'>/etc/modprobe.d/</code> — <strong>no-op</strong> when <code class='inline'>usbcore</code> is built into the kernel; must be a <strong>kernel cmdline</strong> token (on Omarchy/Limine: edit <code class='inline'>/etc/kernel/cmdline</code> then <code class='inline'>limine-update</code> + reboot). Optional hardening only; not required for the fix that stuck.</div></li>
		<li><div><strong>Runtime recover alone</strong> (EHCI unbind/rebind + reload rtw88) — clears a soft hang after the fact, does not prevent the next load-induced wedge.</div></li>
	</ol>
	<h3>What finally worked</h3>
	<p>
		Persistent <code class='inline'>rtw88</code> module options, then reload the Wi-Fi modules (Wi-Fi drops briefly).
	</p>
	<p>
		<strong>File:</strong> <code class='inline'>/etc/modprobe.d/rtw88-usb-mitigations.conf</code>
	</p>
	<pre class='indent-c'><code class='block'>options rtw88_core disable_lps_deep=1
options rtw88_usb switch_usb_mode=N</code></pre>
	<p>
		<strong>Apply / reload:</strong>
	</p>
	<pre class='indent-c'><code class='block'>sudo tee /etc/modprobe.d/rtw88-usb-mitigations.conf &lt;&lt;'EOF'
options rtw88_core disable_lps_deep=1
options rtw88_usb switch_usb_mode=N
EOF

sudo modprobe -r rtw88_8822bu rtw88_usb rtw88_8822b rtw88_core
sudo modprobe rtw88_8822bu</code></pre>
	<p>
		<strong>Verify (expect Y then N):</strong>
	</p>
	<pre class='indent-c'><code class='block'>cat /sys/module/rtw88_core/parameters/disable_lps_deep   # Y
cat /sys/module/rtw88_usb/parameters/switch_usb_mode      # N</code></pre>
	<p>
		Survives reboot. After this, the same heavy Wi-Fi load that previously soft-hung stayed rock-solid.
	</p>
	<p>
		<strong>Recovery if soft hang recurs (LED on):</strong> unbind/rebind the EHCI host and reload rtw88 (custom <code class='inline'>usb-ehci-recover</code>-style script). Do not treat dark-LED / no-power as the same path.
	</p>
	<h3>Why that fix made sense / what to watch</h3>
	<ul class="list-bullet content-list">
		<li><div><strong>Root cause model:</strong> under heavy traffic, <code class='inline'>rtw88</code> deep <strong>LPS</strong> (low-power sleep) on an older <strong>EHCI</strong> host left the USB command path wedged — register I/O timed out (<code class='inline'>-110</code>) while the stick still had power (LED on).</div></li>
		<li><div><code class='inline'>disable_lps_deep=1</code> keeps the chip out of the deepest sleep that was locking up (slightly higher idle power, more reliable under load).</div></li>
		<li><div><code class='inline'>switch_usb_mode=N</code> stops runtime USB transfer-mode switching, another stress point for Realtek USB Wi-Fi on old EHCI.</div></li>
		<li><div>BIOS tweaks reduce general USB flakiness but <strong>cannot</strong> stop driver deep-sleep from wedging the dongle.</div></li>
	</ul>
	<h2>Watch for recurring</h2>
	<ul class="list-bullet content-list">
		<li><div>Soft (LED on) vs hard (LED dark) — different fix paths.</div></li>
		<li><div>After kernel / rtw88 updates, re-check the two sysfs parameters still show <code class='inline'>Y</code> / <code class='inline'>N</code>.</div></li>
		<li><div>Prefer rear USB 2.0 EHCI; keep a wired NIC enabled when possible.</div></li>
		<li><div>Optional: <code class='inline'>usbcore.autosuspend=-1</code> on the <strong>kernel cmdline</strong> if you still see USB autosuspend pain (not required for this fix).</div></li>
		<li><div>Don’t confuse this with GPU/VA-API video stutter (separate issue on old Polaris + no VP9/AV1 decode).</div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>AI disclosure: written with the help of Ai. You are encouraged to point out errors and omissions</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>