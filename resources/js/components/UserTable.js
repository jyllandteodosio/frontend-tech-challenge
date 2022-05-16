import React from "react";
import ReactDOM from "react-dom";
import Table from "./Table";

function UserTable() {
  return (
    <div className="flex justify-center items-center h-screen">
      <div className="max-w-3xl">
        <Table />
      </div>
    </div>
  );
}
export default UserTable;
// DOM element
if (document.getElementById("app")) {
  ReactDOM.render(<UserTable />, document.getElementById("app"));
}
