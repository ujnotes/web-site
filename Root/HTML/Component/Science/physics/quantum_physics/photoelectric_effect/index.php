<div id='message'>
		<?php $alt='Incident light photons striking a metal surface and ejecting photoelectrons.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is the photoelectric effect?</h3>
	<p>
		The photoelectric effect is the physical phenomenon in which electrons are emitted from the surface of a material—typically a clean metal—when light of sufficient frequency shines upon it.
	</p>
	<p>
		First observed by Heinrich Hertz in 1887 and explained by Albert Einstein in 1905, it provided experimental proof that light cannot be understood solely as continuous waves, but also behaves as discrete packets of energy known as photons.
	</p>
	<h3>The puzzle classical physics could not explain</h3>
	<p>
		By the late nineteenth century, Maxwell's wave theory of light was widely considered complete. According to classical wave mechanics, light energy spreads out continuously across a wave front.
	</p>
	<p>
		Classical wave theory made two clear predictions:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Brighter light should eject faster electrons</strong>: higher light intensity carries more energy, so emitted electrons should leave with greater kinetic energy.</div></li>
		<li><div><strong>Dim light should cause a time delay</strong>: faint light carries less energy per second, so electrons should need time to absorb enough wave energy before escaping.</div></li>
	</ul>
	<p>
		Careful experiments showed that both classical predictions were completely wrong. If the light frequency fell below a specific cutoff threshold, even intense red light failed to eject a single electron. But above that threshold frequency, even extraordinarily dim ultraviolet light ejected electrons instantaneously, with no detectable delay.
	</p>
	<h3>Einstein's photon explanation</h3>
	<p>
		Einstein solved the contradiction by applying Max Planck's quantum hypothesis to electromagnetic radiation itself: light is emitted, transmitted, and absorbed in localized discrete packets of energy called <strong>photons</strong>, each carrying energy proportional to frequency: <strong>E = h f</strong>, where h is Planck's constant and f is light frequency.
	</p>
	<p>
		Inside the metal, an incoming photon transfers its entire energy to a single electron in an instantaneous one-to-one collision:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Work function (Φ)</strong>: the minimum energy required to liberate an electron from the metal surface.</div></li>
		<li><div><strong>Below threshold frequency (h f &lt; Φ)</strong>: no individual photon possesses enough energy to free an electron, no matter how many photons hit the surface per second.</div></li>
		<li><div><strong>Above threshold frequency (h f ≥ Φ)</strong>: the electron absorbs the photon, pays the work function fee to escape, and leaves with the remaining energy as kinetic energy: <strong>K_max = h f - Φ</strong>.</div></li>
	</ul>
	<p>
		Increasing light brightness simply means delivering more photons per second, ejecting more electrons, but without altering the speed of any individual electron. To increase an electron's kinetic energy, you must increase the light's frequency.
	</p>
	<h3>The birth of the quantum revolution</h3>
	<p>
		Einstein was awarded the 1921 Nobel Prize in Physics not for his general theory of relativity, but specifically for his theoretical explanation of the photoelectric effect.
	</p>
	<p>
		The discovery established the foundation of quantum mechanics and proved <strong>wave-particle duality</strong>: light travels across space with wave characteristics such as interference and diffraction, yet exchanges energy with matter in localized, particle-like packets.
	</p>
	<h3>Practical technologies that rely on it</h3>
	<p>
		The photoelectric effect is behind several everyday modern technologies:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Solar photovoltaic panels</strong>: solar cells absorb sunlight photons to liberate electrons within semiconductor junctions, generating clean direct-current electricity.</div></li>
		<li><div><strong>Digital camera sensors</strong>: CMOS and CCD image sensors convert incoming scene photons into proportional electrical charges at every pixel site to record digital photographs.</div></li>
		<li><div><strong>Photomultiplier tubes and night vision</strong>: high-gain optical detectors amplify faint light by converting individual incident photons into cascading showers of electrons that illuminate digital screens.</div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>