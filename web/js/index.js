/**
* Javascript and React JS entry file.
* Author: wildpenguin@gmail.com
*/

import React from 'react';
import ReactDOM from 'react-dom';
import Modal from 'react-modal';

const customStyles = {
  content : {
    top                   : '50%',
    left                  : '50%',
    right                 : 'auto',
    bottom                : 'auto',
    marginRight           : '-50%',
    transform             : 'translate(-50%, -50%)'
  }
};


class CustomizableComponent extends React.Component {
    constructor(props) {
        super(props);

        this.saveNewText = this.saveNewText.bind(this);
        this.handleTextChange = this.handleTextChange.bind(this);
        this.openModal = this.openModal.bind(this);
        this.afterOpenModal = this.afterOpenModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
  
        this.state = {
            modalIsOpen: false,
            elementValue: this.props.element.textContent
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
    
    handleTextChange(e) {
        this.setState({elementValue: e.target.value});
        console.log('new value' + e.target.value);
    }

    saveNewText() {
        $.ajax({
          method: 'POST',
          url: 'api/content/'+this.props.element.id,
          data: {
            value: this.state.elementValue
          }
        })
        .done(function(data) {
            console.log('chunk saved');
        });
    }

    render() {
     
            return (

                <span> 
                    {this.state.elementValue}  
                    <sup>
                        <i className="fa fa-pencil-square" aria-hidden="true" onClick={this.openModal}></i>
                    </sup>
               
                    <Modal
                        isOpen={this.state.modalIsOpen}
                        onAfterOpen={this.afterOpenModal}
                        onRequestClose={this.closeModal}
                        style={customStyles}
                        contentLabel="Example Modal"
                    >
                    <h2 ref="subtitle">Online Editor</h2>
                    <form>
                        <textarea onChange={this.handleTextChange} defaultValue={this.state.elementValue}>
                            </textarea>
                    </form>
                    <button className="btn btn-primary" onClick={this.saveNewText}>Save</button>
                    <button className="btn" onClick={this.closeModal}>Close</button>
                    </Modal>
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


var elements = findCustomizable();

for (var i=0; i < elements.length; i++) {
    attachEditable(elements[i]);
}

