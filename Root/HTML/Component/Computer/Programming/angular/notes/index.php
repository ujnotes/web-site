<div id='message'>
	<p>
		Frontend.
	</p>
	<p>
		Enhanced HTML for Web apps.
	</p>
	<pre class='indent-c'><code class='block'>Model View -Whatever</code></pre>
	<p>
		Model : JS.
	</p>
	<p>
		View : HTML.
	</p>
	<p>
		Style: SCSS.
	</p>
	<h2>Annotations</h2>
	<h4>ng-</h4>
	<p>
		App.
	</p>
	<p>
		Controller.
	</p>
	<h2>Variables</h2>
	<h4>$scope</h4>
	<p>
		Mother variable.
	</p>
	<h2>Iterate</h2>
	<p>
		https://stackoverflow.com/questions/29953198/foreach-loop-in-angularjs
	</p>
	<p>
		For(let e of elements).
	</p>
	<p>
		Routing.
	</p>
	<p>
		URLs.
	</p>
	<h2>/</h2>
	<p>
		From room.
	</p>
	<pre class='indent-c'><code class='block'>/ &lt;No slash&gt;</code></pre>
	<p>
		Relative.
	</p>
	<h2>Private variables won’t leak on to the html side - and can be accessed only in the ts files</h2>
	<pre class='indent-c'><code class='block'>e.g. constructor(private &lt;service&gt;: &lt;instance&gt;)</code></pre>
	<p>
		There can be only a single form group on a page.
	</p>
	<h2>Execution path</h2>
	<pre class='indent-c'><code class='block'>\\ angular.json &gt; build &gt; main &gt; &lt;path/&lt;main_file&gt;.ts&gt; &gt; boostrapModule()</code></pre>
	<h2>main.ts creates browser environment for the application to run</h2>
	<p>
		Imports { platformBrowserDynamic } from '@angular/platform-browser-dynamic';.
	</p>
	<p>
		Calls bootstrapModule(AppModule).
	</p>
	<p>
		PlatformBrowserDynamic().bootstrapModule(AppModule).
	</p>
	<h2>Module, component and service</h2>
	<h2>Component is a piece of UI</h2>
	<p>
		Defined using @Component decorator.
	</p>
	<p>
		Has three parts.
	</p>
	<h2>1. .ts file</h2>
	<ol class="list-number content-list">
		<li><div>Has class.</div></li>
	</ol>
	<h2>2. .html</h2>
	<ol class="list-number content-list">
		<li><div>Template - with dom piece.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>can be presented inplace by enclosing in tildes.</div></li>
	</ol>
	<h2>3. .scss</h2>
	<ol class="list-number content-list">
		<li><div>Stylesheet.</div></li>
	</ol>
	<p>
		Selector.
	</p>
	<p>
		TemplateUrl.
	</p>
	<p>
		StyleUrls.
	</p>
	<pre class='indent-c'><code class='block'>ng generate component &lt;component_name&gt;</code></pre>
	<p>
		Ng g c test.
	</p>
	<h2>@Component({</h2>
	<pre class='indent-c'><code class='block'>@Component({ templateUrl: "./app.&lt;component&gt;.html",</code></pre>
	<p>
		<strong>selector.</strong> "app",.
	</p>
	<p>
		}).
	</p>
	<h2>export class AppComponent {</h2>
	<p>
		Data = "This is an example component of two way data binding.";.
	</p>
	<p>
		}.
	</p>
	<h2>Modules</h2>
	<p>
		Modules to group components.
	</p>
	<p>
		One whole module is transported as one unit.
	</p>
	<p>
		Two types.
	</p>
	<h2>1. root</h2>
	<ol class="list-number content-list">
		<li><div>Only one.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>imports BrowserModule.</div></li>
	</ol>
	<h2>2. Feature</h2>
	<ol class="list-number content-list">
		<li><div>imports CommonModule.</div></li>
	</ol>
	<p>
		Registered in module providers.
	</p>
	<h2>Service</h2>
	<p>
		Single instance class that facilitate communication across classes.
	</p>
	<p>
		@Injectable decorator.
	</p>
	<p>
		Provides methods that can be invoked directly by importing the service.
	</p>
	<pre class='indent-c'><code class='block'>ng g s &lt;service-name&gt;</code></pre>
	<h2>Scope</h2>
	<p>
		Binder between controller(js) and view(html).
	</p>
	<p>
		Object - available to both.
	</p>
	<h2>Data binding</h2>
	<p>
		Direct communication between DOM and component - no explicit data push pull.
	</p>
	<h2>1. Property binding</h2>
	<h4>1. DOM element’s property : field in Component</h4>
	<ol class="list-number content-list">
		<li><div>Handled internally.</div></li>
	</ol>
	<h2>2. Event binding</h2>
	<p>
		<strong>1. DOM event.</strong> Component method.
	</p>
	<h2>3. String binding</h2>
	<p>
		<strong>1. DOM element.</strong> {{ Component_field }}.
	</p>
	<h2>4. Two way data binding</h2>
	<p>
		<strong>1. DOM element filed.</strong> Component field.
	</p>
	<ol class="list-number content-list">
		<li><div>One end immediately reflects on another end.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>5. &lt;input [(ngModel)]="data"  type="text"&gt;</code></pre>
	<pre class='indent-c'><code class='block'>6. &lt;h2&gt;You entered the data:  {{data}}&lt;/h2&gt;</code></pre>
	<h2>Decorators</h2>
	<p>
		Modify service, directive or filter.
	</p>
	<h4>Provides configuration metadata</h4>
	<pre class='indent-c'><code class='block'>Provides configuration metadata @&lt;decorator&gt;({</code></pre>
	<pre class='indent-c'><code class='block'>&lt;metadata_property&gt;: ‘&lt;value&gt;’...</code></pre>
	<pre class='indent-c'><code class='block'>Provides configuration metadata export class &lt;class&gt; {</code></pre>
	<p>
		)}.
	</p>
	<p>
		}.
	</p>
	<ol class="list-number content-list">
		<li><div>Method.</div></li>
	</ol>
	<h2>2. Class</h2>
	<p>
		<strong>1. specify.</strong> Component or module.
	</p>
	<h2>3. Parameter</h2>
	<ol class="list-number content-list">
		<li><div>arguments to class constructors.</div></li>
	</ol>
	<h4>2. add functionality</h4>
	<ol class="list-number content-list">
		<li><div>e.g. @HostListener(‘click’, [‘$event’]).</div></li>
	</ol>
	<h2>4. Property</h2>
	<h4>1. @Input(), @Output, @ReadOnly(), @Override()</h4>
	<p>
		<strong>1. Output.</strong> From child component to parent.
	</p>
	<ol class="list-number content-list">
		<li><div>class property.</div></li>
	</ol>
	<h2>Annotations</h2>
	<p>
		Hard-coded. Metadata - set on class to ‘reflect’ metadata library.
	</p>
	<p>
		Annotations property added to class - array - annotation saved.
	</p>
	<p>
		Instance name same as annotation.
	</p>
	<h2>Pipes</h2>
	<p>
		Used to transform data.
	</p>
	<h2>@Pipe({</h2>
	<pre class='indent-c'><code class='block'>@Pipe({ name: ‘&lt;pipe_name&gt;’;</code></pre>
	<p>
		<strong>pure.</strong> [false|true].
	</p>
	<p>
		}).
	</p>
	<pre class='indent-c'><code class='block'>export class &lt;Pipe_name&gt; {}</code></pre>
	<p>
		Progression from left to right.
	</p>
	<h2>1. Pure</h2>
	<ol class="list-number content-list">
		<li><div>only methods - no properties - stateless.</div></li>
	</ol>
	<h2>2. Impure</h2>
	<ol class="list-number content-list">
		<li><div>impure method - has propertie(s) and thus state.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Runs on every change detect cycle.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Heavy on cpu resource.</div></li>
	</ol>
	<h2>3. Pipe transform Interface</h2>
	<ol class="list-number content-list">
		<li><div>for custom transform.</div></li>
	</ol>
	<h4>2. 1st param - value of binding</h4>
	<ol class="list-number content-list">
		<li><div>2nd param - list of arguments.</div></li>
	</ol>
	<h2>4. Pipe chaining</h2>
	<pre class='indent-c'><code class='block'>4. Pipe chaining 1. &lt;var&gt;|&lt;pipe_1_transform&gt;|&lt;pipe_2_transform&gt;</code></pre>
	<h2>Share data</h2>
	<p>
		@input - @output.
	</p>
	<pre class='indent-c'><code class='block'>export class &lt;component&gt; {</code></pre>
	<pre class='indent-c'><code class='block'>@Input() &lt;property&gt;: &lt;type&gt;;</code></pre>
	<p>
		}.
	</p>
	<h4>Parent to child</h4>
	<p>
		Use property directly.
	</p>
	<h4>Child to parent</h4>
	<pre class='indent-c'><code class='block'>Child to parent @ViewChild(&lt;ChildComponent&gt;, {static:[true|false]} &lt;child&gt;;</code></pre>
	<h4>ngAfterViewInit() {</h4>
	<pre class='indent-c'><code class='block'>ngAfterViewInit() { this.&lt;dataFromChild&gt; = this.&lt;child&gt;.&lt;data&gt;</code></pre>
	<p>
		}.
	</p>
	<h4>Banana in Box</h4>
	<p>
		[()].
	</p>
	<p>
		For bi-directional sharing of data.
	</p>
	<p>
		Loading.
	</p>
	<h2>1. Eager</h2>
	<ol class="list-number content-list">
		<li><div>pre-load before execution begins.</div></li>
	</ol>
	<h2>2. Lazy</h2>
	<ol class="list-number content-list">
		<li><div>Load modules as needed.</div></li>
	</ol>
	<h2>View encapsulation</h2>
	<p>
		Specifies if specific component’s template and style can impact the entire app or vice versa.
	</p>
	<h2>1. Native</h2>
	<ol class="list-number content-list">
		<li><div>No inheritance.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Limited to component.</div></li>
	</ol>
	<h2>2. Emulated</h2>
	<ol class="list-number content-list">
		<li><div>Inheritance.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Limited to component.</div></li>
	</ol>
	<h2>3. None</h2>
	<ol class="list-number content-list">
		<li><div>Inheritance?</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Not limited to component.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>“styles will be repeated in each component - with native encapsulation?</div></li>
	</ol>
	<h2>RxJS</h2>
	<p>
		Reactive extensions for JavaScript.
	</p>
	<p>
		Observables -&gt; Reactive programming.
	</p>
	<h4>Async / callback - based code -&gt; sequence of operations on data streams</h4>
	<p>
		Publisher to subscriber.
	</p>
	<h4>Often used with http requests - as it is async.</h4>
	<p>
		Subscribe.
	</p>
	<h2>Data binding</h2>
	<p>
		Interconnection between model and view.
	</p>
	<h2>String interpolation</h2>
	<h4>{{ }}</h4>
	<p>
		Content is executed.
	</p>
	<p>
		For example, 1+1 =&gt; 2.
	</p>
	<p>
		Part of data binding.
	</p>
	<p>
		One way.
	</p>
	<h2>Property binding</h2>
	<h4>[]</h4>
	<p>
		<strong>Property of DOM element.</strong> Component’s property.
	</p>
	<p>
		Part of data binding.
	</p>
	<h4>One way</h4>
	<p>
		Component logic to view.
	</p>
	<h2>Event binding</h2>
	<h4>()</h4>
	<p>
		<strong>target listens to events.</strong> Click, keypress.
	</p>
	<h2>Two way</h2>
	<h4>[()]</h4>
	<p>
		Banana in box.
	</p>
	<p>
		Observables v/s promise.
	</p>
	<h2>1. Observables</h2>
	<ol class="list-number content-list">
		<li><div>can be both async or synchronous.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Can emit multiple values - i.e. multiple times.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Lazy - called only when subscribed to.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Unsubscribe() to cancel.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Operators, multiple - map, forEach, filter, reduce, retry, retryWhen….</div></li>
	</ol>
	<h2>2. Promise</h2>
	<ol class="list-number content-list">
		<li><div>always async.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>can only emit single value - i.e. once.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Not lazy.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Cannot be canceled.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>No such operators.</div></li>
	</ol>
	<h2>Dependency injection</h2>
	<p>
		Design pattern.
	</p>
	<p>
		Services.
	</p>
	<h4>Component</h4>
	<h4>onInit</h4>
	<pre class='indent-c'><code class='block'>onInit Constructor(&lt;service&gt;) {}</code></pre>
	<h2>Input</h2>
	<h4>pattern</h4>
	<p>
		[]{}.
	</p>
	<p>
		For example, .
	</p>
	<h2>Lifecycle</h2>
	<p>
		Applicable to components.
	</p>
	<p>
		Initialized - then - destroyed.
	</p>
	<p>
		Hooks - tap into the lifecycle events.
	</p>
	<ol class="list-number content-list">
		<li><div>Constructor.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>ngOnChanges.</div></li>
	</ol>
	<h2>3. ngOnInit</h2>
	<ol class="list-number content-list">
		<li><div>called after first ngOnChanges.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>If lot of processing - better here instead of constructor.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Initializes component and sets input properties.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>no arguments, and returns void.</div></li>
	</ol>
	<h2>4. ngDoCheck</h2>
	<ol class="list-number content-list">
		<li><div>after ngOnInit.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>used to detect changes that cannot be detected by Angular.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>custom change detection algorithm.</div></li>
	</ol>
	<h2>5. ngAfterContentInit</h2>
	<ol class="list-number content-list">
		<li><div>after ngDoCheck.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>after ?content gets projected? into component.</div></li>
	</ol>
	<h2>6. ngAfterContentChecked</h2>
	<ol class="list-number content-list">
		<li><div>after ngAfterContentInit and after every subsequent ngDoCheck.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>responds after ?projected content is checked?</div></li>
	</ol>
	<h2>7. ngAfterViewInit</h2>
	<ol class="list-number content-list">
		<li><div>after view initialized.</div></li>
	</ol>
	<h2>8. ngAfterViewChecked</h2>
	<ol class="list-number content-list">
		<li><div>after ngAfterViewInit.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>after view checked.</div></li>
	</ol>
	<h2>9. ngOnDestroy</h2>
	<ol class="list-number content-list">
		<li><div>after component destroyed by Angular.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>to be used to clean up and detach event handlers.</div></li>
	</ol>
	<p>
		Imports OnInit but implements ngOnInit.
	</p>
	<p>
		Same with other hooks.
	</p>
	<h2>Router links</h2>
	<pre class='indent-c'><code class='block'>Router links &lt;a routerLink=’/&lt;path&gt;’&gt;&lt;title&gt;&lt;/a&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Router links &lt;router-outlet&gt;&lt;/router-outlet&gt;</code></pre>
	<h2>Router state</h2>
	<p>
		Route tree.
	</p>
	<p>
		<strong>nodes.</strong> ‘consumed’ url segments, retrieved arguments and ?processed data?.
	</p>
	<p>
		Uses router service and router state property to get current RouterState from anywhere.
	</p>
	<h2>Angular Material</h2>
	<p>
		User interface component.
	</p>
	<pre class='indent-c'><code class='block'>uniform - consistent, appealing, functional - contemporary design concepts: gentle degradation and browser portability</code></pre>
	<h2>Transpiling</h2>
	<p>
		Compiling one language code into another.
	</p>
	<h4>e.g. TS is transpiled into JS code by Angular</h4>
	<p>
		<strong>Dart can also be used.</strong> AngularDart.
	</p>
	<p>
		Internal.
	</p>
	<h2>Http intercept</h2>
	<p>
		Both HttpRequest &amp; HttpResponse can be intercepted.
	</p>
	<p>
		For example, to add auth headers at one place.
	</p>
	<h2>AOT</h2>
	<p>
		Ahead of time compilation.
	</p>
	<p>
		Compiled during build time - i.e. pre production.
	</p>
	<p>
		Faster rendering.
	</p>
	<p>
		Fewer ajax loads.
	</p>
	<p>
		Error detection during build phase.
	</p>
	<p>
		Fewer files - better security.
	</p>
	<p>
		Default is JIT.
	</p>
	<p>
		<strong>for AOT.</strong> Ng build –aot, ng serve –aot.
	</p>
	<h2>Change detection</h2>
	<p>
		Process of synchronizing view with model.
	</p>
	<p>
		One directional, from root to children.
	</p>
	<p>
		?all components are children, themselves Not parent?
	</p>
	<h2>Bootstrapping module</h2>
	<p>
		Initial.
	</p>
	<p>
		<strong>Popular.</strong> ‘AppModule’.
	</p>
	<h2>MVVM</h2>
	<p>
		Model, View, ViewModel.
	</p>
	<h2>Model</h2>
	<p>
		Data model.
	</p>
	<h2>View</h2>
	<p>
		Visual layer.
	</p>
	<h2>ViewModel</h2>
	<p>
		Abstract layer - manages business logic and translation.
	</p>
	<p>
		Bound to view - data-binding - two way.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
