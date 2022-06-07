/**!
 * UI
 */
 import $ from 'jquery';

 export default class Ui {

 	constructor() {
        this.events();
 	}

    events() {
        $( "body" ).on( "click", ".show-password-link", this.showHidePsw.bind(this) );
    }

    showHidePswBtn(e) {
        if( e.length ) {
            
            if ( e.length > 1 ) {
                let elem  = $(e);
                const btn = $(`<span class="show-password-link" title="Show Password">Show Password</span>`);
                btn.insertAfter(elem);
            } else {
                e.each(function(i, el){
                    let elem = $(el);
                    const btn = $(`<span class="show-password-link" title="Show Password">Show Password</span>`);
                    btn.insertAfter(elem);
                });
            }
        
        }
    }

 }
