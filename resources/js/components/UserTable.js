import React from "react";
import ReactDOM from "react-dom";
import Table from "./Table";

function UserTable() {
  return (
    <div className="container mt-5">
      <div className="row justify-content-center">
        <div className="col-md-8">
          <Table />
        </div>
      </div>
    </div>
  );
}
export default UserTable;
// DOM element
if (document.getElementById("app")) {
  ReactDOM.render(<UserTable />, document.getElementById("app"));
}
