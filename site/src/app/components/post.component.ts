import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { PostService } from '../services/post.service';

@Component({
    providers: [PostService],
    template: `
	<div class="blog-post">
	    <h2 class="blog-post-title">{{post.title}}</h2>
	    <p class="blog-post-meta">
		{{ post.created_at*1000 | date:"dd MMMM yyyy" }}, by {{ post.user }}
	    </p>
	    <p>{{post.text}}</p>
	</div>\n\
	<a routerLink="/posts" >Back to posts</a>
    `
})
export class PostComponent implements OnInit, OnDestroy {
    
    private id:any;
    private sub:any;
    
    post: Object = {};

    constructor(
	private postService: PostService,
	private route: ActivatedRoute,
    ) { }

    getPost(id:any): void {
	this.postService.getPost(id).subscribe(post => this.post = post);
    }
    
    ngOnInit(): void {
	
	this.sub = this.route.params.subscribe(params => {
	    this.id = params['id'];
	    this.getPost(this.id);
	});
	
    }
    
    ngOnDestroy() {
	this.sub.unsubscribe();
    }
    
}
