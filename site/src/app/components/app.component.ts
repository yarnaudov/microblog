import { Component } from '@angular/core';

@Component({
    selector: 'app',
    template: `\n\
	<div class="container" >
	    <br>
	    <router-outlet></router-outlet>
	</div>
    `,
})
export class AppComponent { }
