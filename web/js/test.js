class App extends React.Component {

  constructor() {
    super();

    this.state = {
      data: 'hahaha'
    };

  }

  render() {
    return <h1>{this.state.data}</h1>;
  }
}

ReactDOM.render(<App/>, document.getElementById('app'));