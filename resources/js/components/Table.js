import { useState, useEffect } from "react";
import TableBody from "./TableBody";
import TableHead from "./TableHead";

const Table = () => {
  const [tableData, setTableData] = useState([]);

  useEffect(() => {
    async function getData() {
      const response = await fetch(`http://localhost/api/users`);

      let actualData = await response.json();

      console.log(actualData);
      setTableData(actualData.users);
    }
    getData();
  }, []);

  const columns = [
    { label: "First Name", accessor: "first_name", sortable: true },
    { label: "Last Name", accessor: "last_name", sortable: true },
    { label: "Email", accessor: "email", sortable: true },
  ];

  const handleSorting = (sortField, sortOrder) => {
    if (sortField) {
      const sorted = [...tableData].sort((a, b) => {
        return (
          a[sortField].toString().localeCompare(b[sortField].toString(), "en", {
            numeric: true,
          }) * (sortOrder === "asc" ? 1 : -1)
        );
      });
      setTableData(sorted);
    }
  };

  return (
    <>
      <table className="table md:table-fixed">
        <TableHead columns={columns} handleSorting={handleSorting} />
        <TableBody columns={columns} tableData={tableData} />
      </table>
    </>
  );
};

export default Table;
