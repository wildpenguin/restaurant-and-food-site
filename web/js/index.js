/**
* Javascript and React JS entry file.
* Author: wildpenguin@gmail.com
*/

import React from 'react';
import ReactDOM from 'react-dom';

//import Modal from 'react-modal';


class DialogForm extends React.Component {
    constructor(props) {
        super(props);
        this.onTextChange = this.onTextChange.bind(this);
        this.onTextSave = this.onTextSave.bind(this);
    }
    
    onTextChange(e) {
        this.props.handleTextChange(e.target.value);
        console.log('saving..');
    }

    onTextSave(e) {
        e.preventDefault();
        this.props.handleTextSave();
        console.log("clicked");return;
    }

    render() {
        return (
            <form>
                <textarea onChange={this.onTextChange} defaultValue={this.props.value} >
                </textarea> <br/>
                <button onClick={this.onTextSave} className="btn btn-primary">Save</button>
            </form>
        );
    }
}



class DialogBox extends React.Component {
  
    constructor(props) {
        super(props)
        this.openDialog = this.openDialog.bind(this);
        this.closeDialog = this.closeDialog.bind(this);
    }

    openDialog(e) {
      e.preventDefault();
      
      var $dialog = $('<div>').dialog({
        title:'Edit Text',
        width:auto,
        height:auto,
        close: function(e){
          $(this).remove();
        }
      });
    }
      
      closeDialog(e) {
        e.preventDefault();
        $dialog.dialog('close');
      }
        
      //React.renderComponent(<DialogContent closeDialog={closeDialog} />, $dialog[0])
    
    render() {
      return(
        <sup>  <i className="fa fa-pencil-square" aria-hidden="true" onClick={this.openDialog}></i> 
        </sup>
      );
    }
  };

class CustomizableComponent extends React.Component {
    constructor(props) {
        super(props);

        this.handleTextSave = this.handleTextSave.bind(this);
        this.handleTextChange = this.handleTextChange.bind(this);
        this.openModal = this.openModal.bind(this);
        this.afterOpenModal = this.afterOpenModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
  
        this.state = {
            modalIsOpen: false,
            elementValue: this.props.element.textContent,
            displayForm: true,
        };
       
    }

    openModal() {
        this.setState({modalIsOpen: true});
    }

    afterOpenModal() {
        // references are now sync'd and can be accessed.
        this.refs.subtitle.style.color = '#f00';
    }

    closeModal() {
        this.setState({modalIsOpen: false});
    }
    
    handleTextChange(value) {
        this.setState({elementValue: value});
        console.log('new value' + value);
    }

    handleTextSave() {
        $.ajax({
          method: 'POST',
          url: 'api/content/'+this.props.element.id,
          data: {
            value: this.state.elementValue
          },
          dataType: 'json',
          success: function(data) {
            if ('success' == data.status) {
                this.setState({displayForm: false});
            };
          }.bind(this)
        });
    }

    render() {
            /*var dialogBody = <DialogForm 
                    value={this.state.elementValue} 
                    handleTextChange={this.handleTextChange} 
                    handleTextSave={this.handleTextSave}
                />;
            if (this.state.displayForm === false) {
                dialogBody = "Your text was saved!";
            }*/
            return (
                <span> 
                    {this.state.elementValue}
                   
               
                    <DialogBox
                        isOpen={this.state.modalIsOpen}
                        //onAfterOpen={this.afterOpenModal}
                        //onRequestClose={this.closeModal}
                        //style={customStyles}
                        //contentLabel="Example Modal"
                    >
                    <h2 ref="subtitle">Edit text</h2>
                    <button className="btn" onClick={this.closeModal}>Close</button>
                    </DialogBox>
                </span>
            );
           
        }

    //}
}

function findCustomizable()
{
    var elements = document.getElementsByClassName('customizable');

    return elements;
}

function attachEditable(element) {

    ReactDOM.render(
        <CustomizableComponent element={element} />,
        element
    );
}

function init() {

    var elements = findCustomizable();

    for (var i=0; i < elements.length; i++) {
        attachEditable(elements[i]);
    }
}

/* main function */
init();

